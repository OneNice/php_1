<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 10.03.2019
 * Time: 23:47
 */

namespace app\controllers;


use app\models\User;

class UserController extends AppController
{
    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();

            if(!$user->checkLogin()){
                $_SESSION['error'] = 'Логин или пароль не совпадают';
                //redirect();
            }
            else{
                redirect(PATH);
            }
            redirect();
        }
        $this->setMeta('Вход');
    }

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);

            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
            }
            else{
                $user->attributes['password'] = password_hash($user->attributes['password'],PASSWORD_BCRYPT, ["cost" => 12] );
                if($user->save('user')){
                    $_SESSION['success'] = 'Упешная регистрация';
                }
                else {
                    $_SESSION['error'] = 'Регистрация не удалась';
                }
            }
            redirect();
        }
        $this->setMeta('Регистрация');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

}