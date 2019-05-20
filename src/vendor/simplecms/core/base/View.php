<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 20.02.2019
 * Time: 21:13
 */

namespace simplecms\base;


class View
{
    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $layout;

    public $data = [];  //для передачи данных из контроллера в вид
    public $meta = [];

    public function __construct($route, $layout= '', $view = '', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];

        $this->meta = $meta;
        if($layout===false){
            $this->layout = false;
        }
        else{
            $this->layout = $layout ?: LAYOUT;      //Если пустая строка, то значение пустой строки
        }
    }

    public function render($data){
        if(is_array($data)){
            extract($data);     //Достаём данные из массива в переменные, используем переменные в виде
        }
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}" . ".php";       //Файл вида (динамическое содержимое
        if(is_file($viewFile)){
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();      //получаем контент из вида
        }
        else{
            throw new \Exception("Не найден файл вида {$viewFile}", 500);
        }
        if($this->layout !== false)                                                                 //файл шаблона (статический шаблон)
        {
            $layoutFile = APP . "/views/layouts/{$this->layout}" . ".php";
            if(is_file($layoutFile)){
                require_once $layoutFile;
            }
            else{
                throw new \Exception("Не найден шаблон {$layoutFile}", 500);
            }
        }
        else{

        }
    }

    public function getMeta(){
        $str = '<title>'. $this->meta['title']  .'</title>' . PHP_EOL;
        $str .= '<meta name="description" content="'. $this->meta['description'] .'" />' . PHP_EOL;
        $str .= '<meta name="keywords" content="'. $this->meta['keywords'] .'" />' . PHP_EOL;
        return $str;
    }
}