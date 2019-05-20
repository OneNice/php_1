<?php

namespace simplecms;


class Registry
{
    use TSingletone;
    protected static $properties = [];  //храним пары ключ/занчения

    public function setProperty($name, $value){
        self::$properties[$name] = $value;
    }

    public function getProperty($name){
        if(isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        else return null;
    }

    public function getProperties(){
        return self::$properties;
    }
}