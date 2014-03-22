<?php

use Phalcon\Loader,
    Phalcon\Mvc\Application,
    Phalcon\DI\FactoryDefault,
    Phalcon\Db\Adapter\Pdo\Mysql;

try {

    //define app path
    define('ROOT_PATH', dirname(__DIR__));
    define('APP_PATH', ROOT_PATH . '/ishgo');

    //register namespaces
    $loader = new Loader();
    $loader->registerNamespaces(
        array(
            'Ishgo\Work\Controllers'  => APP_PATH . '/work/controllers/',
            'Ishgo\Work\Models'       => APP_PATH . '/work/models/',
            'Ishgo\Index\Controllers' => APP_PATH . '/index/controllers/',
            'Ishgo\Index\Models'      => APP_PATH . '/index/models/',
            'Ishgo\Admin\Controllers' => APP_PATH . '/admin/controllers/',
            'Ishgo\Admin\Models'      => APP_PATH . '/admin/models/',
        )
    );
    $loader->register();

    $di = new FactoryDefault();
    $di->set('router', function () {
        return include ROOT_PATH . '/config/routes.php';
    });


    $di->set('db', function() {
        return new Mysql(array(
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'ishgo'
        ));
    });

    // $di['test'] = function(){
    //     return new Redis();
    // };

    $di->set('test', function() {
        return new Redis();
    });

    $di->set('annotations', function(){
        include ROOT_PATH . '/libraries/RedisAdapter.php';
        return new RedisAdapter(); 
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