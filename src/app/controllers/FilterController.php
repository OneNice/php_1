<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 21.03.2019
 * Time: 10:22
 */

namespace app\controllers;


use RedBeanPHP\R;
use simplecms\App;
use simplecms\libs\Pagination;

class FilterController extends AppController
{
    public function saveAction(){
        if($this->isAjax()){
            if(!isset($_SESSION['filter'])) $_SESSION['filter'] = [];
            $categories = isset($_POST['categories']) ? $_POST['categories'] : null;
            if($categories != "save") {
                if ($categories) {
                    $flag = true;
                    foreach ($categories as $value) {
                        if(!is_numeric($value)){
                            $flag = false;
                        }
                    }
                    if($flag) {$_SESSION['filter']['categories'] = $categories;}
                    else{
                        if (isset($_SESSION['filter']['categories'])) unset($_SESSION['filter']['categories']);
                    }
                } else {
                    if (isset($_SESSION['filter']['categories'])) unset($_SESSION['filter']['categories']);
                }
            }


            $price_free = isset($_POST['price_free']) ? $_POST['price_free'] : null;
            if($price_free != 'save') {
                if ($price_free && $price_free == 'true') {
                    $_SESSION['filter']['price_free'] = 'checked';
                } else {
                    if (isset($_SESSION['filter']['price_free'])) unset($_SESSION['filter']['price_free']);
                }
            }


            $price_range = isset($_POST['price_range']) ? $_POST['price_range'] : null;
            if($price_range != 'save') {
                if ($price_range && count($price_range)==2 && is_numeric($price_range[0]) && is_numeric($price_range[1])) {
                    $_SESSION['filter']['price_range'] = $price_range;
                } else {
                    if (isset($_SESSION['filter']['price_range'])) unset($_SESSION['filter']['price_range']);
                }
            }



            $datenow =  date("Y-m-d H:i:s");
            $datenow = date('Y-m-d H:i:s',strtotime($datenow . "-7 days"));     //Каждое мероприятие идёт 7 дней. Проверяем эту дату

            $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;     //текушая страница
            $perPage = NUMTOSEE;         //сколько элементов на странице
            //ФИЛЬТРЫ
            $array = '';
            if(isset($_SESSION['filter']['categories'])){
                $array .= ' AND category_id IN (' . implode(',',$_SESSION['filter']['categories']) . ')';
            }
            if(isset($_SESSION['filter']['price_free'])){
                $array .= " AND price = '0'";
            }
            elseif(isset($_SESSION['filter']['price_range'])){
                $array .= ' AND price BETWEEN ' . $_SESSION['filter']['price_range'][0] . ' AND ' . $_SESSION['filter']['price_range'][1];
            }
            //ФИЛЬТРЫ

            $count = R::count('event', "status = '1' AND date_start > ? ".$array, [$datenow]);

            $pagination = new Pagination($page, $perPage, $count);
            $getStart = $pagination->getStart();

            $events = R::find('event', "status = '1' AND date_start > ? ".$array." LIMIT ?,?", [$datenow, $getStart, $perPage]);

            ob_start();
            require \APP.'\views\Filter\index.php';
            echo ob_get_clean();

        }
        exit;
    }
    public function clearAction(){
        if(isset($_SESSION['filter'])) unset($_SESSION['filter']);
            $datenow = date("Y-m-d H:i:s");
            $datenow = date('Y-m-d H:i:s', strtotime($datenow . "-7 days"));     //Каждое мероприятие идёт 7 дней. Проверяем эту дату

            $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;     //текушая страница
            $perPage = NUMTOSEE;         //сколько элементов на странице
            //ФИЛЬТРЫ
            $array = '';
            if (isset($_SESSION['filter']['categories'])) {
                $array .= ' AND category_id IN (' . implode(',', $_SESSION['filter']['categories']) . ')';
            }
            if (isset($_SESSION['filter']['price_free'])) {
                $array .= ' AND price IS NULL';
            } elseif (isset($_SESSION['filter']['price_range'])) {
                $array .= ' AND price BETWEEN ' . $_SESSION['filter']['price_range'][0] . ' AND ' . $_SESSION['filter']['price_range'][1];
            }
            //ФИЛЬТРЫ

            $count = R::count('event', "status = '1' AND date_start > ? " . $array, [$datenow]);

            $pagination = new Pagination($page, $perPage, $count);
            $getStart = $pagination->getStart();

            $events = R::find('event', "status = '1' AND date_start > ? " . $array . " LIMIT ?,?", [$datenow, $getStart, $perPage]);

            ob_start();
            require \APP . '\views\Filter\index.php';
            echo ob_get_clean();
        exit;
    }
}