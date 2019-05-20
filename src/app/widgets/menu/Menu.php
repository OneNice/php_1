<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 24.02.2019
 * Time: 23:25
 */

namespace app\widgets\menu;


use app\models\AppModel;
use simplecms\App;
use simplecms\Cache;

class Menu
{
    protected $data;
    protected $tree;    //дерево меню
    protected $html;    //итоговый код
    protected $template;
    protected $container = 'ul';
    protected $containerClass = 'menu';
    protected $table = 'category';
    protected $cache = 0;
    protected $cacheKey = '_menu1';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->template = __DIR__ . '/layouts/default.php';
        $this->getOprions($options);
        $this->run();
    }

    protected function getOprions($options)
    {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    protected function run()
    {
        $cache = Cache::instance();
        $this->html = $cache->get($this->cacheKey);
        if (!$this->html) {
            $this->data = App::$app->getProperty('cats');
            if (!$this->data) {
                //$this->data = R::getAssoc("SELECT * FROM {$this->table}");
            }

            $this->tree = $this->getTree();
            $this->html = $this->getMenuHtml($this->tree);
            if($this->cache)
            {
                $cache->set($this->cacheKey, $this->html, $this->cache);
            }
        }
        $this->output();
    }

    protected function output()
    {
        $attrs = '';
        if(!empty($this->attrs))    //атрибуты к контейнеру
        {
            foreach ($this->attrs as $k=>$v) {
                $attrs .= " $k = '$v' ";
            }
        }
        echo "<{$this->container} class='{$this->containerClass}' {$attrs}>";
        echo $this->prepend;
        echo $this->html;
        echo "</{$this->container}>";
    }

    protected function getTree(){   //создаём дерево категорий
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->template;
        return ob_get_clean();
    }
}