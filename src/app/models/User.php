<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 10.03.2019
 * Time: 23:48
 */

namespace app\models;


use simplecms\Db;

class User extends AppModel
{
    public $attributes = [
      'name' => '',
      'login' => '',
      'email' => '',
      'phone' => '',
      'password' => ''
    ];

    public $rules = [       //список правил, каждое правило - массив полей
        'required' => [     //перечисляем обязательные поля
            ['login'],
            ['email'],
            ['password'],
            ['name'],
            ['phone'],
        ],
          'email' => [
              ['email'],
          ],
          'lengthMin' => [
              ['password' , 8],
          ],
        'regex' => [
            ['phone', '/^[+][0-9]{3}-[0-9]{2}\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/'],
        ]
    ];


    public function checkUnique(){      //Проверка при регистрации

        $user = \R::findOne('user', 'login = ? or email = ?', [
            $this->attributes['login'],
            $this->attributes['email']
        ]);
        if(isset($_SESSION['user']) && $user){
                $user2 = \R::findOne('user', 'email = ?', [
                    $this->attributes['email']
                ]);
                $user3 = \R::findOne('user', 'login = ?', [
                    $this->attributes['login']
                ]);
                if($user2->id == $_SESSION['user']['id'] && $user3->id == $_SESSION['user']['id'])
                {
                    return true;
                }
        }
        if($user){
            if($user->login == $this->attributes['login']){
                $this->errors['unique'][] = 'Этот логин уже существует';
            }
            else{
                $this->errors['unique'][] = 'Этот email уже существует';
            }
            return false;
        }
        return true;
    }


    public function checkLogin($admin = false){     //проверка при авторизации
        if(isset($_SESSION['user'])){
            $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
            $user = \R::findOne('user', 'id = ?', [$_SESSION['user']['id']]);
            if($user){
                if(password_verify($password, $user->password)){
                    return true;
                }
                else return false;
            }
            else return false;
        }
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password){
            if(!$admin) {
                $user = \R::findOne('user', 'login = ?', [$login]);
            }
            else{       //Если идёт авторизация админа
                $user = \R::findOne('user', "login = ? AND role = 'admin'", [$login]);
            }
            if($user){
                if(password_verify($password, $user->password)){
                    foreach ($user as $name=>$value){
                        if($name != 'password'){
                            $_SESSION['user'][$name] = $value;
                        }
                    }
                    return true;
                }
            }
            else{
                return false;
            }
        }
        return false;
    }

    public static function checkAuth(){
        return isset($_SESSION['user']);
    }

    public static function isAdmin(){
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }

}