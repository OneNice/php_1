<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 28.03.2019
 * Time: 15:59
 */

namespace app\controllers\admin;


use RedBeanPHP\R;

class ReviewController extends AppController
{
    public function indexAction(){

        $votes = R::findAll('votes');

        $this->set(compact('votes'));
    }
}