<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 24.03.2019
 * Time: 12:46
 */

namespace app\controllers\admin;

use RedBeanPHP\R;
class TopController extends AppController
{
    public function indexAction(){
        $tops = R::findAll('top');

        $this->set(compact('tops'));
    }

    public function addAction(){
        $events = R::findAll('event');

        $this->set(compact('events'));
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $top = R::findOne('top', 'id = ?', [$id]);
                $events = R::findAll('event');
                $this->set(compact('top', 'events'));
            }
            else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/top'); }
        }
        else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/top'); }
    }


    private function getUnusedRandomFileName($ext) {
        do {
            $name = uniqid('Upload_', true) . '.' . $ext;
        } while (file_exists(WWW . '/img/upload/' . $name));
        return $name;
    }
    private function uploadFile($input = 'file'){
        $uploaddir = WWW . '/img/upload/';

        $imageFileType = strtolower(pathinfo($uploaddir . basename($_FILES['file']['name']),PATHINFO_EXTENSION));

        $_FILES[$input]['name'] = $this->getUnusedRandomFileName($imageFileType);
        $uploadfile = $uploaddir . $_FILES[$input]['name'];

        if ($_FILES[$input]["size"] > 5300000) {
            $_SESSION['errors'] = "Файл слишком большой :c мы на такое не готовы";
            redirect();
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION['errors'] = "Только картинки разрешены к загрузке";
            redirect();
        }

        if (move_uploaded_file($_FILES[$input]['tmp_name'], $uploadfile)) {
            return $_FILES[$input]['name'];
        } else {
            $_SESSION['errors'] = "Возможная атака с помощью файловой загрузки!";
            redirect();
        }

    }

    public function saveAction(){
        if(!empty($_POST)){
            if(isset($_POST['id']) && is_numeric($_POST['id'])){
                $top = R::findOne('top', 'id = ?', [$_POST['id']]);
            }
            else {
                $top = R::dispense('top');
            }
            $top->event_id = $_POST['event_id'];
            $top->image = $this->uploadFile();

            if(R::store($top))
            {
                $_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/top');
            }
            else{
                $_SESSION['errors'] = 'Ошибочка вышла';
                redirect('/admin/top/add');
            }
        }
        $_SESSION['errors'] = 'Эй, что ты творишь!';
        redirect('/admin/top');
    }


    public function delAction(){
        if(!empty($_POST['id'])){

            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $top = R::findOne('top', 'id = ?', [$id]);
                R::trash( $top);
                //$_SESSION['errors'] = 'Возможно будет добавляться статус т.к. удалять сложно';
                $_SESSION['success'] = 'Успешно удалили!';
                redirect('/admin/top');
            }
            $_SESSION['errors'] = 'Ошибочка вышла';
            redirect('/admin/top');
        }
        redirect();
    }
}