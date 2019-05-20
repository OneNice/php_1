<?php
require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';

$app = new \simplecms\App();
//debug(\simplecms\App::$app->getProperties());
//debug(\simplecms\Router::getRoutes());
