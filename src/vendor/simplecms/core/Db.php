<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 20.02.2019
 * Time: 23:34
 */

namespace simplecms;


use RedBeanPHP\R;

class Db
{

    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONF . '/db.php';
        class_alias('\RedBeanPHP\R','\R');
        R::setup($db['dsn'], $db['user'], $db['pass']);

        if(!R::testConnection()){
            throw new \Exception("Нет соединения с mysql", 500);
        }
        R::freeze(true); //запрет на автоизменение структуры таблиц
        if(DEBUG)
        {
            R::debug(true, 1);
        }
    }
}