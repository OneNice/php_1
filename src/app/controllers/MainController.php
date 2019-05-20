<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 20.02.2019
 * Time: 18:17
 */

namespace app\controllers;


use RedBeanPHP\R;
use simplecms\App;
use simplecms\Cache;
use simplecms\libs\Pagination;

class MainController extends AppController
{
    public function indexAction(){
        //debug($this->route);
        //$this->layouts = 's';
        //$this->view = 'lol';
        $this->setMeta(App::$app->getProperty('site_name') . ' Главная', 'asd', 'asd');

        $datenow =  date("Y-m-d H:i:s");
        $datenow = date('Y-m-d H:i:s',strtotime($datenow . "-7 days"));     //Каждое мероприятие идёт 7 дней. Проверяем эту дату
        //$cache = Cache::instance();
        //$time = time();


        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;     //текушая страница
        $perPage = NUMTOSEE;         //сколько элементов на странице


        //ФИЛЬТРЫ
        $array = '';
        if(isset($_SESSION['filter']['categories'])){
            $array .= ' AND category_id IN (' . implode(',',$_SESSION['filter']['categories']) . ')';
        }
        if(isset($_SESSION['filter']['price_free'])){
            $array .= ' AND price IS NULL';
        }
        elseif(isset($_SESSION['filter']['price_range'])){
            $array .= ' AND price BETWEEN ' . $_SESSION['filter']['price_range'][0] . ' AND ' . $_SESSION['filter']['price_range'][1];
        }
        //ФИЛЬТРЫ

        $count = R::count('event', "status = '1' AND date_start > ? ".$array, [$datenow]);

        $pagination = new Pagination($page, $perPage, $count);
        $getStart = $pagination->getStart();


        $events = R::find('event', "status = '1' AND date_start > ? ".$array." LIMIT ?,?", [$datenow, $getStart, $perPage]);
        $tops = R::find('top', "LIMIT " . NUMTOPS);

        //$time2 = time();

        $this->set(compact('events', 'tops', 'pagination' ));       //передача данных в вид, compact
        $this->setMeta('Заказ билетов');

    }
}