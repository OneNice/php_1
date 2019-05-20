<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 27.02.2019
 * Time: 23:32
 */

namespace app\controllers;


use RedBeanPHP\R;
use simplecms\App;
use simplecms\libs\Pagination;

class CategoryController extends AppController
{
    public function viewAction(){
        //debug($this->route);
        $events = null;

        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;     //текушая страница
        $perPage = NUMTOSEE;         //сколько элементов на странице

        $datenow =  date("Y-m-d H:i:s");
        $datenow = date('Y-m-d H:i:s',strtotime($datenow . "-7 days"));     //Каждое мероприятие идёт 7 дней. Проверяем эту дату

        if(isset($this->route['subcat'])){
            $sub_category = $this->route['subcat'];
            $category = $this->route['cat'];

            $cat2 = R::findOne('category', "alias = ?", [$sub_category]);
            $cat1 = R::findOne('category', "alias = ?", [$category]);


            if(!$cat2 || !$cat1)
            {
                throw new \Exception('Страница не найдена', 404);
            }


            $count = \R::count('event', 'category_id = ? AND status = \'1\' AND date_start > ?', [$cat2->id, $datenow]);

            $pagination = new Pagination($page, $perPage, $count);
            $getStart = $pagination->getStart();

            $events = R::find('event', "category_id = ? AND status = '1' AND date_start > ? LIMIT ?, ?", [$cat2->id, $datenow, $getStart, $perPage]);
            $this->setMeta($cat2->name, $cat2->meta_description, $cat2->meta_keywords);
        }
        else{
            $category = $this->route['cat'];
            $cat1 = R::findOne('category', "alias = ?", [$category]);
            if(!$cat1)
            {
                throw new \Exception('Страница не найдена', 404);
            }

            $children_cat = R::find('category', "parent_id = ?", [$cat1->id]);
            $cat_arr = [$cat1->id];
            if($children_cat){
                foreach ($children_cat as $item) {
                    array_push($cat_arr, $item->id);
                }
            }

            $str = implode( ',', $cat_arr);


            $count = \R::count('event', "category_id in ({$str}) AND status = '1' AND date_start > ?", [$datenow]);

            $pagination = new Pagination($page, $perPage, $count);
            $getStart = $pagination->getStart();


            $events = R::find('event', "category_id in ({$str}) AND status = '1' AND date_start > ? LIMIT ?, ?", [$datenow, $getStart, $perPage]);

            /*$logs = R::getDatabaseAdapter()
                ->getDatabase()
                ->getLogger();

            print_r( $logs->grep( 'SELECT' ) );*/

            $this->setMeta($cat1->name, $cat1->meta_description, $cat1->meta_keywords);
        }


        $this->set(compact('events','cat1',  'cat2','pagination'));
    }
}