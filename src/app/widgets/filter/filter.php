<?php
namespace app\widgets\filter;


use simplecms\App;

class filter
{
    public $tpl;


    public function __construct()
    {
        $this->tpl = __DIR__ . '/filter_template.php';
        $this->run();
    }

    public function run(){
        echo $this->getHtml();
    }

    public function getHtml(){
        $data = App::$app->getProperty('cats');
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}