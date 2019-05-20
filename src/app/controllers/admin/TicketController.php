<?php
/**
 * Created by PhpStorm.
 * order: onela
 * Date: 28.03.2019
 * Time: 8:35
 */

namespace app\controllers\admin;


use RedBeanPHP\R;

class TicketController extends AppController
{
    public function indexAction(){
        $orders = R::findAll('orders');

        $this->set(compact('orders'));
    }

    public function delAction(){
        if(!empty($_POST['id'])){

            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $order = R::findOne('orders', 'id = ?', [$id]);
                //R::trash( $order);
                $_SESSION['errors'] = 'Возможно будет добавляться статус т.к. удалять сложно';
                //$_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/ticket');
            }
            $_SESSION['errors'] = 'Ошибочка вышла';
            redirect('/admin/ticket');
        }
        redirect();
    }

    public function cancelAction(){
        if(!empty($_POST['id'])){

            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $order = R::findOne('orders', 'id = ?', [$id]);
                //R::trash( $order);
                $order->status = 'cancel_by_admin';
                R::store($order);
                $_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/ticket');
            }
            $_SESSION['errors'] = 'Ошибочка вышла';
            redirect('/admin/ticket');
        }
        redirect();
    }
}