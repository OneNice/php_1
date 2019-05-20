<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 10.03.2019
 * Time: 21:32
 */

namespace app\controllers;


use simplecms\App;
use simplecms\libs\Pagination;

class SearchController extends AppController
{
    public function indexAction(){
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;

        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;     //текушая страница
        $perPage = NUMTOSEE;         //сколько элементов на странице
        $count = \R::count('event', "status = '1' AND title LIKE ?",["%{$query}%"]);

        $pagination = new Pagination($page, $perPage, $count);
        $getStart = $pagination->getStart();

        if($query){
            $events = \R::find('event', "status = '1' AND title LIKE ? LIMIT ?, ?",["%{$query}%", $getStart, $perPage]);
        }
        $this->set(compact('events', 'pagination'));


        $this->setMeta('Поиск ' . myclear($query));
    }
    public function typeaheadAction(){
        if($this->isAjax())
        {
                $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
                if($query){
                    $events = \R::getAll("SELECT id, title FROM event WHERE status = '1' AND title LIKE ? LIMIT 7" , ["%{$query}%"]);
                    echo json_encode($events);
                }
        }
        die;
    }
}