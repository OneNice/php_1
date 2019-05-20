<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 24.03.2019
 * Time: 12:25
 */

namespace app\controllers\admin;

use RedBeanPHP\R;

class PlaceController extends AppController
{
    public function indexAction(){
        $places = R::findAll('place');

        $this->set(compact('places'));
    }

    public function addAction(){

    }

    public function editAction(){
        if(!empty($_POST)){
            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $place = R::findOne('place', 'id = ?', [$id]);
                $this->set(compact('place'));
            }
            else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/cat'); }
        }
        else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/cat'); }
    }


    public function delAction(){
        if(!empty($_POST['id'])){

            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $place = R::findOne('place', 'id = ?', [$id]);
                R::trash( $place);
                //$_SESSION['errors'] = 'Возможно будет добавляться статус т.к. удалять сложно';
                $_SESSION['success'] = 'Успешно удалили!';
                redirect('/admin/place');
            }
            $_SESSION['errors'] = 'Ошибочка вышла';
            redirect('/admin/place');
        }
        redirect();
    }


    public function saveAction(){
        if(!empty($_POST)){
            if(isset($_POST['id']) && is_numeric($_POST['id'])){
                $place = R::findOne('place', 'id = ?', [$_POST['id']]);
            }
            else {
                $place = R::dispense('place');
            }
            $place->name = $_POST['name'];
            $place->city = $_POST['city'];

            if(R::store($place))
            {
                $_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/place');
            }
            else{
                $_SESSION['errors'] = 'Ошибочка вышла';
                redirect('/admin/place/add');
            }
        }
        $_SESSION['errors'] = 'Эй, что ты творишь!';
        redirect('/admin/place');
    }
}