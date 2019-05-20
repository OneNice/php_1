<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 24.03.2019
 * Time: 12:25
 */

namespace app\controllers\admin;


use RedBeanPHP\R;
class TimeController extends AppController
{
    public function indexAction(){
        $eventtimes = R::findAll('eventtimes');

        $this->set(compact('eventtimes'));
    }

    public function addAction(){
        $events = R::findAll('event', 'place_id is null');
        $places = R::findAll('place');

        $this->set(compact('events', 'places'));
    }


    public function editAction(){
        if(!empty($_POST)){
            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $time = R::findOne('eventtimes', 'id = ?', [$id]);
                $date_arr = "[" . implode(',', json_decode($time->date_array)) . "]";
                $events = R::findAll('event', 'place_id is null');
                $places = R::findAll('place');
                $this->set(compact('time', 'date_arr','events', 'places'));
            }
            else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/time'); }
        }
        else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/time'); }
    }

    public function saveAction(){
        if(!empty($_POST)){
            if(isset($_POST['id']) && is_numeric($_POST['id'])){
                $eventtimes = R::findOne('eventtimes', 'id = ?', [$_POST['id']]);
            }
            else {
                $eventtimes = R::dispense('eventtimes');
            }
            $eventtimes->event_id = $_POST['event_id'];
            $eventtimes->place_id = $_POST['place_id'];
            $eventtimes->date_array = $_POST['date_array'];

            if(R::store($eventtimes))
            {
                $_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/time');
            }
            else{
                $_SESSION['errors'] = 'Ошибочка вышла';
                redirect('/admin/time/add');
            }
        }
        $_SESSION['errors'] = 'Эй, что ты творишь!';
        redirect('/admin/time');
    }

    public function delAction(){
        if(!empty($_POST['id'])){

            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $eventtimes = R::findOne('eventtimes', 'id = ?', [$id]);
                R::trash( $eventtimes);
                //$_SESSION['errors'] = 'Возможно будет добавляться статус т.к. удалять сложно';
                $_SESSION['success'] = 'Успешно удалили!';
                redirect('/admin/time');
            }
            $_SESSION['errors'] = 'Ошибочка вышла';
            redirect('/admin/time');
        }
        redirect();
    }
}