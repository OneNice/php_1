<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 20.02.2019
 * Time: 21:08
 */

namespace app\controllers;


use app\models\AppModel;
use RedBeanPHP\R;
use simplecms\App;
use simplecms\base\Controller;
use simplecms\Cache;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('cats', self::cacheCategory());
    }

    public static function cacheCategory(){
        $cache = Cache::instance();
        $cats = $cache->get('cats');

        if(!$cats){
            $cats = R::getAssoc("SELECT * FROM category");
            $cache->set('cats', $cats);
        }
        return $cats;
    }
}