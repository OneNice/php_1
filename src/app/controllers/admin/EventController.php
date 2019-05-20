<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 24.03.2019
 * Time: 12:25
 */

namespace app\controllers\admin;

use RedBeanPHP\R;

class EventController extends AppController
{
    public function indexAction(){
        $events = R::findAll('event');

        $this->set(compact('events'));
    }

    public function addAction(){
        $categories = R::findAll('category');
        $places = R::findAll('place');


        $this->set(compact('places', 'categories'));
    }


    public function editAction(){
        if(!empty($_POST)){
            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $event = R::findOne('event', 'id = ?', [$id]);
                $categories = R::findAll('category');
                $places = R::findAll('place');

                $this->set(compact('event', 'categories', 'places'));
            }
            else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/event'); }
        }
        else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/event'); }
    }


    public function delAction(){
        if(!empty($_POST['id'])){

            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $event = R::findOne('event', 'id = ?', [$id]);
                //R::trash( $event);
                $_SESSION['errors'] = 'Возможно будет добавляться статус т.к. удалять сложно';
                //$_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/event');
            }
            $_SESSION['errors'] = 'Ошибочка вышла';
            redirect('/admin/event');
        }
        redirect();
    }


    public function saveAction(){
        if(!empty($_POST)){
            if(isset($_POST['id']) && is_numeric($_POST['id'])){
                $event = R::findOne('event', 'id = ?', [$_POST['id']]);
            }
            else {
                $event = R::dispense('event');
            }
            $event->title = $_POST['title'];
            $event->content = $_POST['content'];
            $event->alias = $_POST['alias'];
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {
                $event->image_array = $this->uploadFile();
            }
            $event->price = $_POST['price'];
            $event->num_of_seats = $_POST['num_of_seats'];
            $event->meta_keywords = $_POST['meta_keywords'];
            $event->meta_description = $_POST['meta_description'];
            $event->additional_field = $_POST['additional_field'];

            if ($_POST['category_id'] == ''|| empty($_POST['category_id'])) $event->category_id = null;
                else $event->category_id = (int)$_POST['category_id'];

            if ($_POST['place_id'] == '' || empty($_POST['place_id'])) $event->place_id = null;
                else $event->place_id = (int)$_POST['place_id'];

            $event->date_start = $_POST['date_start'];
            if(!empty($_POST['status'])) $event->status = '1';
                else $event->status = '0';

            if(R::store($event))
            {
                $_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/event');
            }
            else{
                $_SESSION['errors'] = 'Ошибочка вышла';
                redirect('/admin/event/add');
            }
        }
        $_SESSION['errors'] = 'Эй, что ты творишь!2';
        redirect('/admin/event');
    }




    private function getUnusedRandomFileName($ext) {
        do {
            $name = uniqid('Upload_', true) . '.' . $ext;
        } while (file_exists(WWW . '/img/upload/' . $name));
        return $name;
    }
    private function uploadFile($input = 'file'){
        $uploaddir = WWW . '/img/upload/';

        $imageFileType = strtolower(pathinfo($uploaddir . basename($_FILES[$input]['name']),PATHINFO_EXTENSION));

        $_FILES[$input]['name'] = $this->getUnusedRandomFileName($imageFileType);
        $uploadfile = $uploaddir . $_FILES[$input]['name'];

        if ($_FILES[$input]["size"] > 5300000) {
            $_SESSION['errors'] = "Файл слишком большой :c мы на такое не готовы";
            redirect('/admin');
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION['errors'] = "Только картинки разрешены к загрузке";
            redirect('/admin');
        }

        if (move_uploaded_file($_FILES[$input]['tmp_name'], $uploadfile)) {
            return $_FILES[$input]['name'];
        } else {
            $_SESSION['errors'] = "Возможная атака с помощью файловой загрузки!";
            redirect('/admin');
        }

    }
}