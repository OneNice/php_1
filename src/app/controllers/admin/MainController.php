<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 23.03.2019
 * Time: 18:46
 */

namespace app\controllers\admin;



use RedBeanPHP\R;
use simplecms\App;

class MainController extends AppController
{
    public function indexAction(){

        $datenow =  date("Y-m-d H:i:s");
        $datenow = date('Y-m-d H:i:s',strtotime($datenow . "-7 days"));


        $countUser = R::count('user');
        $count_event_all = R::count('event');
        $count_event = R::count('event',"status = '1' AND date_start > ? ", [$datenow]);
        $sumTotal = R::getCol('select sum(price) from orders WHERE status is NULL');

        $ordersLastWeek = R::count('orders',"time > ? ", [$datenow]);
        $orders = R::count('orders');

        $ordersLastWeekF = R::count('orders',"status is NOT NULL AND time > ? ", [$datenow]);
        $ordersF = R::count('orders','status is NOT NULL');

        $this->setMeta('Панель управления');
        $this->set(compact('countUser', 'count_event', 'count_event_all', 'sumTotal', 'orders', 'ordersLastWeek', 'ordersF', 'ordersLastWeekF'));
    }
}