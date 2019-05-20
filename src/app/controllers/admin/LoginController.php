<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 23.03.2019
 * Time: 20:32
 */

namespace app\controllers\admin;


use app\models\User;

class LoginController extends AppController
{
    public $layout = 'admin_login';
    function indexAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->checkLogin(true)){
                if(User::isAdmin()) redirect(ADMIN);
                else redirect();
            }
            else {
                redirect();
            }

        }
    }
}