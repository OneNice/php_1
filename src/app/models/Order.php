<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 10.03.2019
 * Time: 16:47
 */

namespace app\models;


class Order extends AppModel
{
    public $attributes = [
        'user_id' => '',
        'event_id' => ''
    ];

    public function setOrder($id, $seat, $booked_seat , $place = null, $date = null){

        $event = \R::findOne('event', 'id = ?', [$id]);
        $event->booked_seats = json_encode($booked_seat);

        $sel_table = \R::dispense('orders');
        $sel_table->user_id = $_SESSION['user']['id'];
        $sel_table->event_id = $id;
        $sel_table->time = date("Y-m-d H:i:s");
        $sel_table->date = $date ? $date : $event->date_start;
        $sel_table->place_id = $place ? $place : $event->place_id;
        $sel_table->price = $event->price;
        $sel_table->seat = $seat;



        $store = \R::store($sel_table);     //вернёт id записи
        $store2 = \R::store($event);     //вернёт id записи
        if($store && $store2) {
            return true;
        }
        return false;

    }

}