<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 20.02.2019
 * Time: 23:27
 */

namespace simplecms\base;


use simplecms\Db;
use Valitron\Validator;

abstract class Model
{
    public $attributes = [];        //свойства модели (идентично полям бд)
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        Db::instance();
    }

    public function load($data){        //заполняем все аттрибуты
        foreach ($this->attributes as $name=>$value) {
            if(isset($data[$name])){
                $this->attributes[$name]=$data[$name];
            }
        }
    }

    public function validate($data){        //валидация с помощью библиотеки
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);        //загружаем правила валидации
        if($v->validate())
        {
            return true;
        }
        $this->errors = $v->errors();       //вернём ошибки
        return false;
    }

    public function getErrors(){
        $errors = '<ul>';
        foreach ($this->errors as $error) {
            foreach ($error as $item){
                $errors .= "<li>{$item}</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }


    public function save($table){       //сохраняем все атрибуты модели в таблицу
        $sel_table = \R::dispense($table);          //
        foreach ($this->attributes as $name => $value) {
                $sel_table->$name = $value;
        }
        return \R::store($sel_table);       //сохраняем таблицу и возврат id or
    }
}