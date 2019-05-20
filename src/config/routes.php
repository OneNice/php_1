<?php
use simplecms\Router;

Router::add('^lk/change/(?P<subcat>[a-z0-9-]+)?$', ['controller' => 'Lk', 'action'=> 'change']);
Router::add('^cat/(?P<cat>[a-z0-9-]+)/?(?P<subcat>[a-z0-9-]+)?$', ['controller' => 'Category', 'action'=> 'view']);
Router::add('^event/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Event', 'action'=> 'view']);

Router::add('^admin$', ['controller' => 'Main', 'action'=> 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action'=> 'index']);  //^ начало $ - конец (пустая строка)
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');  // ?текст? - необязателен  ?P<text> - индекс элемента в массиве