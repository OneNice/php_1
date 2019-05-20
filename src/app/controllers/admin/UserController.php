<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 24.03.2019
 * Time: 12:04
 */

namespace app\controllers\admin;


use RedBeanPHP\R;

class UserController extends AppController
{
    public function indexAction(){
        $users = R::findAll('user');

        $this->set(compact('users'));
    }

    public function addAction(){

    }

    public function editAction(){
        if(!empty($_POST)){
            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $user = R::findOne('user', 'id = ?', [$id]);
                $this->set(compact('user'));
            }
            else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/cat'); }
        }
        else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/cat'); }
    }


    public function delAction(){
        if(!empty($_POST['id'])){

            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $user = R::findOne('user', 'id = ?', [$id]);
                //R::trash( $user);
                $_SESSION['errors'] = 'Возможно будет добавляться статус пользователю т.к. удалять сложно';
                //$_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/user');
            }
            $_SESSION['errors'] = 'Ошибочка вышла';
            redirect('/admin/user');
        }
        redirect();
    }


    public function saveAction(){
        if(!empty($_POST)){
            if(isset($_POST['id']) && is_numeric($_POST['id'])){
                $user = R::findOne('user', 'id = ?', [$_POST['id']]);
                if(!empty($_POST['password'])) {
                    $user->password = password_hash($_POST['password'],PASSWORD_BCRYPT, ["cost" => 12] );
                }
            }
            else {
                $user = R::dispense('user');
                $user->password = password_hash($_POST['password'],PASSWORD_BCRYPT, ["cost" => 12] );
            }
            $user->name = $_POST['name'];
            $user->login = $_POST['login'];
            $user->email = $_POST['email'];
            $user->phone = $_POST['phone'];
            $user->role = $_POST['role'];

            if(R::store($user))
            {
                $_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/user');
            }
            else{
                $_SESSION['errors'] = 'Ошибочка вышла';
                redirect('/admin/user/add');
            }
        }
        $_SESSION['errors'] = 'Эй, что ты творишь!';
        redirect('/admin/user');
    }
}