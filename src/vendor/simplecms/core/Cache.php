<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 21.02.2019
 * Time: 8:20
 */

namespace simplecms;


class Cache
{
    use TSingletone;
                                    //сколько по времени кэшируется
    public function set($key, $data, $timeTo = 3600){
        if($timeTo){
            $content['data'] = $data;
            $content['end_time'] = time() + $timeTo;

            if(file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))){
                return true;
            }
        }
        return false;
    }

    public function get($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if(time()<= $content['end_time']){
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            unlink($file);
        }

    }

}