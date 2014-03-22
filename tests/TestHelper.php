<?php
use Phalcon\DI,
    Phalcon\Loader,
    Phalcon\DI\FactoryDefault,
    Phalcon\Db\Adapter\Pdo\Mysql;

ini_set('display_errors',1);
error_reporting(E_ALL);

define('APP_PATH', '../ishgo');
// required for phalcon/incubator
include __DIR__ . "/../vendor/autoload.php";

// use the application autoloader to autoload the classes
// autoload the dependencies found in composer
$loader = new Loader();

$loader->registerNamespaces(
    array(
        'Phalcon' => '../vendor/phalcon/incubator/Library/Phalcon/',
        'Ishgo\Index\Controllers' => APP_PATH . '/index/controllers/',
        'Ishgo\Index\Models'      => APP_PATH . '/index/models/',
        'Ishgo\Admin\Controllers' => APP_PATH . '/admin/controllers/',
        'Ishgo\Admin\Models'      => APP_PATH . '/admin/models/',
    )
);

$loader->register();

$di = new FactoryDefault();
DI::reset();

// add any needed services to the DI here
DI::setDefault($di);
$di->set('db', function() {
    return new Mysql(array(
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'test'
    ));
});
