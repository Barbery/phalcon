<?php

$router = new \Phalcon\Mvc\Router\Annotations(false);
$router->setDefaultModule('index');
$router->setDefaultNamespace('Ishgo\Index\Controllers');

# 设置admin url映射
$router->add('/admin', array(
    'module' => 'admin',
    'action' => 'index',
    'params' => 'index'
));

$router->add('/admin/:controller', array(
    'module'     => 'admin',
    'controller' => 1,
    'action'     => 'index'
));

$router->add('/admin/:controller/:action/:params', array(
    'module'     => 'admin',
    'controller' => 1,
    'action'     => 2,
    'params'     => 3
));


# 设置work url映射
$router->add('/work', array(
    'module' => 'work',
    'action' => 'index',
    'params' => 'index'
));

$router->add('/work/:controller', array(
    'module'     => 'work',
    'controller' => 1,
    'action'     => 'index'
));

$router->add('/work/:controller/:action/:params', array(
    'module'     => 'work',
    'controller' => 1,
    'action'     => 2,
    'params'     => 3
));


$router->addModuleResource('index', 'Ishgo\Index\Controllers\User', '/api/users');
return $router;