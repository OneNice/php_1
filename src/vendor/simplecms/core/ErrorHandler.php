<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 19.02.2019
 * Time: 19:16
 */

namespace simplecms;


class ErrorHandler
{
    public function __construct()
    {
        if(DEBUG){
            error_reporting(-1);
        }
        else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e){
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError("Исключение", $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file= '', $line = ''){
        error_log(
            "[". date("d-m-Y H:i:s") ."] Ошибка: {$message} | File: {$file} | Line: {$line}\n**********\n",
            3,
            ROOT."/tmp/errors.log"
            );
    }

    protected function displayError($errnum, $errstr, $errfile, $errline, $responce = 404){
        http_response_code($responce);
        if($responce==404 && !DEBUG){
            //показываем шаблон
            require WWW."/errors/404.php";
            die;
        }
        if(DEBUG){
            require WWW."/errors/dev.php";
        }
        else {
            require WWW."/errors/prod.php";
        }
        die;
    }
}