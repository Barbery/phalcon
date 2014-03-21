<?php

use \Phalcon\Mvc\Router,
    \Phalcon\Mvc\Application,
    \Phalcon\DI\FactoryDefault,
    \Phalcon\Db\Adapter\Pdo\Mysql;

try {

    //define app path
    define('ROOT_PATH', dirname(__DIR__));
    define('APP_PATH', ROOT_PATH . '/ishgo');

    $di = new FactoryDefault();
    $di->set('router', function () {
        $router = new \Phalcon\Mvc\Router\Annotations();
        $router->setDefaultModule('index');

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

        $router->addModuleResource('index', 'User', '/api/users');
        return $router;
    });


    $di->set('db', function() {
        return new Mysql(array(
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'ishgo'
        ));
    });


    //Create an application
    $application = new Application($di);

    // Register the installed modules
    $application->registerModules(
        array(
            'index' => array(
                'className' => 'Ishgo\Index\Module',
                'path'      => APP_PATH . '/index/Module.php',
            ),
            'admin' => array(
                'className' => 'Ishgo\Admin\Module',
                'path'      => APP_PATH . '/admin/Module.php',
            ),
            'work'  => array(
                'className' => 'Ishgo\Work\Module',
                'path'      => APP_PATH . '/work/Module.php',
            )
        )
    );

    //add common functions
    include APP_PATH . '/functions.php';
    include ROOT_PATH . '/vendor/autoload.php';
    session_start();
    //Handle the request
    echo $application->handle()->getContent();

} catch(\Exception $e) {
    echo $e->getMessage();
}