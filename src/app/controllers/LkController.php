<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 13.03.2019
 * Time: 17:34
 */

namespace app\controllers;


use app\models\User;

class LkController extends AppController
{
    public $rules = [       //список правил, каждое правило - массив полей
        'required' => [     //перечисляем обязательные поля
            ['login'],
            ['email'],
            ['name'],
            ['phone'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['name' , 2],
        ],
        'regex' => [
            ['phone', '/^[+][0-9]{3}-[0-9]{2}\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/'],
        ]
    ];
    public function indexAction(){

        if(isset($_SESSION['user'])){

            $user = new User();
            foreach ($_SESSION['user'] as $name=>$value){
                $user->$name = $_SESSION['user'][$name];
            }

            $this->set(compact('user'));
            $this->setMeta('Личный кабинет');
        }
        else{
            redirect(PATH);
        }
    }
    public function changeAction(){
        if(isset($_SESSION['user']) && $this->isAjax() && isset($this->route['subcat']) && !empty($_POST))
        {
            if($this->route['subcat'] == 'profile'){
                $user = new User();
                $data = $_POST;
                $user->rules = $this->rules;
                $user->load($data);
                $user->validate($data);

                if(!$user->validate($data) || !$user->checkUnique()){
                    $user->getErrors();
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                else{
                    $user_load = \R::findOne('user','id = ?', [$_SESSION['user']['id']]);

                    $user_load->name = $data['name'];
                    $user_load->login = $data['login'];
                    $user_load->email = $data['email'];
                    $user_load->phone = $data['phone'];

                    $store = \R::store($user_load);

                    echo '1';
                }
            }
            elseif($this->route['subcat'] == 'password'){
                $user = new User();
                if(isset($_POST['password']) && isset($_POST['password_new'])) {
                    if ($user->checkLogin()) {
                        if(strlen($_POST['password_new'])>7)
                        {
                            $user_load = \R::findOne('user','id = ?', [$_SESSION['user']['id']]);

                            $user_load->password =  password_hash($_POST['password_new'],PASSWORD_BCRYPT, ["cost" => 12] );

                            $store = \R::store($user_load);
                            echo 1;
                        }
                        else echo 'Пароль должен быть >=8 символам';
                    }
                    else echo 'Старый пароль введён неверно';
                }
                else{
                    echo 'Заполните все поля';
                }
            }
            die;
        }
    }


    //СДЕЛАТЬ НЕВОЗМОЖНЫМ ЗАКАЗ СТАРЫХ МЕРОПРИЯТИЙ

    public function voteAction(){
        if($this->isAjax() && $_SESSION['user']){
            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            $mark = is_numeric($_POST['vote']) ? $_POST['vote'] : null;
            $comment = isset($_POST['comment']) ? myclear($_POST['comment']) : null;
            if($id && $mark >= 1 && $mark <= 5){
                $vote = \R::findOne('votes', 'event_id = ? AND user_id = ?', [$id, $_SESSION['user']['id']]);
                if(!$vote && \R::findOne('event','id = ?', [$id])){
                    $sel_table = \R::dispense('votes');

                    $sel_table->user_id = $_SESSION['user']['id'];
                    $sel_table->event_id = $id;
                    $sel_table->score = $mark;
                    $sel_table->comment = $comment;

                    if(\R::store($sel_table)) echo 1;

                }
                else echo 'Вы уже оставили отзыв об этом мероприятии';
            }
        }
        die;
    }
}