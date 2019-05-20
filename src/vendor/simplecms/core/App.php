<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 19.02.2019
 * Time: 17:48
 */

namespace simplecms;


class App
{
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER["QUERY_STRING"], "/");
        session_start();
        self::$app = Registry::instance();      //
        $this->getParams();     //Получаем параметры из params.php
        new ErrorHandler();     //Подключаем обработку исключений
        Router::dispatch($query);

    }

    protected function getParams(){
        $params = require_once CONF.'/params.php';
        if(!empty($params))
        {
            foreach ($params as $key => $val) {
                self::$app->setProperty($key, $val);
            }
        }
    }
}