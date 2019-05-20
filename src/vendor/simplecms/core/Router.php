<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 19.02.2019
 * Time: 19:51
 */

namespace simplecms;


class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;

    }
    public static function getRoutes(){
        return self::$routes;
    }
    public static function getRoute(){
        return self::$route;
    }

    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if(self::matchRoute($url))
        {
            $controller = 'app\controllers\\' . self::$route['prefix'] . (self::$route['controller']).'Controller';   //Если админ, то подставим преикс адмна
            if(class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                }
                else{
                    throw new \Exception("Метод {$action} не найден. Контроллер {$controller}.", 404);
                }
            }
            else{
                throw new \Exception("Контроллер {$controller} не найден", 404);
            }
        }
        else{
            throw new \Exception("Страница не найдена", 404);
        }
    }
    public static function matchRoute($url){       //поиск маршрута и возврат true/false
        foreach (self::$routes as $pattern => $route) {     //перебор роутов
            if(preg_match("#{$pattern}#", $url, $matches)){     //совпадение по паттерну
                foreach ($matches as $val => $key) {
                    if(is_string($val)){
                        $route[$val] = $key;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix']))
                {
                    $route['prefix'] = '';
                }
                else{
                    $route['prefix'].="\\";
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                //debug($matches);
                //debug($route);
                return true;
            }
        }
        return false;
    }

    //для имён контроллеров CamelCase
    protected static function upperCamelCase($name){
        return str_replace(' ', '',ucwords(str_replace('-', ' ', $name)));
    }

    //для имён экшенов camelCase
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }

    //собираем get запрос и очищаем url
    protected static function removeQueryString($url){
        if($url){
            $params = explode('&', $url, 2);    //разделили запрос на две части. Основная и запрос
            if(false === strpos($params[0], '=')){
                //App::$app->setProperty('get', $params[1]);
                return rtrim($params[0], '/');
            }
            else {
                return '';
            }
        }
    }
}