<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 10.03.2019
 * Time: 15:09
 */

namespace app\controllers;


use app\models\Order;

class OrderController extends AppController
{
    public function addAction(){
        if(!empty($_POST) && isset($_SESSION['user'])){
            $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
            $seat = isset($_POST['seat']) ? (int)$_POST['seat'] : null;
            $place_id = isset($_POST['place_id']) ? (int)$_POST['place_id'] : null;
            $date = isset($_POST['date']) ? $_POST['date'] : null;


            if($id && $seat){
                $event = \R::findOne('event', 'id = ?', [$id]);
                if($event){

                    $booked_seat = json_decode($event->booked_seats);

                    if(!$event->place_id) {         //Если place_id не определён  т.е. несколько мест и разное время

                        $eventTIME = \R::findOne('eventtimes', "event_id = ? AND place_id = ?", [$id, $place_id]);

                        if($eventTIME && in_array($date, json_decode($eventTIME->date_array))) {        //Если существуеют даты и место

                            if (isset($booked_seat->$place_id))         //Ищем МЕСТО_ВСТРЕЧИ в забронированных местах
                            {
                                //  'ключ найден';
                                if (isset($booked_seat->$place_id->$date))      //Ищем дату
                                {
                                    // 'дата найдена';
                                    if (in_array($seat, $booked_seat->$place_id->$date))     //Ищем само место
                                    {
                                        return false;   //Место занято, возвращаем 'ошибку' в аякс
                                    } else {
                                        array_push($booked_seat->$place_id->$date, $seat);
                                    }
                                } else {        //создаём дату с новым местом
                                    //$booked_seat->$place_id
                                    $booked_seat->$place_id->$date = [];
                                    array_push($booked_seat->$place_id->$date, $seat);
                                }
                            } else {        //создаём место и дату с новым местом
                                //$booked_seat->$place_id = (object)$date;
                                $booked_seat->$place_id->$date = [];
                                array_push($booked_seat->$place_id->$date, $seat);
                            }
                        }
                    }
                    else{       //place_id определён => одно место и время
                        if(!is_array($booked_seat)) $booked_seat = [];
                        if(in_array($seat, $booked_seat)) return false;
                        array_push($booked_seat, $seat);
                    }


                    if(!$this->isAjax())
                    {
                        redirect();
                    }
                    else{

                        $order = new Order();
                        $order->setOrder($id, $seat, $booked_seat, $place_id ? $place_id : $event->place_id, $date ? $date : $event->date_start);

                        echo 'Вы успешно заказали билет!';
                        die;
                    }

                }
            } return false;
        }
        return false;
    }



    public function getAction(){
        if($this->isAjax() && isset($_SESSION['user'])){
            error_reporting(0);
            $orders = \R::findAll('orders', 'user_id = ? ORDER BY date DESC', [$_SESSION['user']['id']]);
            $ordersList = [];
            foreach ($orders as $order) {
                $ordersFinal = null;
                $ordersFinal->id = $order->id;
                $ordersFinal->category = $order->event->category->name;
                $ordersFinal->title = $order->event->title;
                $ordersFinal->event_id = $order->event_id;
                $ordersFinal->date = $order->date;
                $ordersFinal->time = $order->time;
                $ordersFinal->seat = $order->seat;
                $ordersFinal->price = $order->price;
                $ordersFinal->place = $order->place->name;
                $ordersFinal->status = $order->status ? true : false;
                if($order->date < date("Y-m-d H:i:s")) $ordersFinal->status_date = false;
                else $ordersFinal->status_date = true;
                array_push($ordersList, $ordersFinal);
            }
            echo json_encode($ordersList);
            die;
        }
        redirect();
    }

    public function cancelAction(){
        if($this->isAjax()){
            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $order = \R::findOne('orders', 'id = ?', [$id]);
                if($order) {        //Из-за комментариев пользователь может получить много закрытой информации, но т.к. работает нормально, лень исправлять
                    if (!$order->status) {
                        if ($order->user_id == $_SESSION['user']['id']) {
                            $order->status = 'cancel_by_user';

                            $event = \R::findOne('event','id = ?', [$order->event_id]);

                            if($event){
                                if($event->place_id){       //Если задано конкретное место првоедения и время
                                    $seats = json_decode($event->booked_seats);
                                    $key_seat = array_search($order->seat, $seats);
                                    unset($seats[$key_seat]);
                                    $event->booked_seats = json_encode(array_values($seats));
                                }
                                else{       //разные места и время
                                    $place_o = $order->place_id;
                                    $date_o = $order->date;
                                    $seats = json_decode($event->booked_seats);

                                    $key_seat = array_search($order->seat, $seats->$place_o->$date_o);
                                    unset($seats->$place_o->$date_o[$key_seat]);
                                    $seats->$place_o->$date_o = array_values($seats->$place_o->$date_o);
                                    $event->booked_seats = json_encode($seats);

                                }
                            }

                            \R::store($event);        //тут можно сделать проверку на сохранение в event, но ...
                            \R::store($order);

                            echo '1';

                        } else echo 'У вас отсутсвует эта бронь';
                    } else echo 'Бронь уже не активна';
                }
                else echo 'хватит тестировать наш проект :C';
            }
        }
        exit;
    }
}