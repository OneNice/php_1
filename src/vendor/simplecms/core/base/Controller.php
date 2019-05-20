<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 20.02.2019
 * Time: 20:57
 */

namespace simplecms\base;
//базовый контроллер с общедоступными свойствами

abstract class Controller
{
    public $route;
    public $controller;
    public $view;       //соответсвует экшену
    public $model;
    public $prefix;
    public $layout;     //default || определённый

    public $data = [];  //для передачи данных из контроллера в вид
    public $meta = ['title'=> '', 'description'=> '', 'keywords' => ''];

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];


    }

    public function getView(){
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    public function set($data){
        $this->data = $data;
    }

    public function setMeta($title ='', $description = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }

    public function isAjax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }


    public function loadView($view, $vars = []){
        extract($vars);
        require APP . "/views/{$this->prefix}{$this->controller}/{$view}.php";
        die;
    }
}