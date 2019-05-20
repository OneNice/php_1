<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 23.03.2019
 * Time: 18:47
 */

namespace app\controllers\admin;


use app\models\AppModel;
use app\models\User;
use simplecms\base\Controller;


class AppController extends Controller
{
    public $layout = 'admin';
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        if(!User::isAdmin() && $route['controller'] != 'Login'){
            redirect(ADMIN . '/login');
        }
    }
}