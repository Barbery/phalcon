<?php

namespace Ishgo\Index;

use Phalcon\Loader,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\View,
    Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{

    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders()
    {

        $loader = new Loader();

        $loader->registerNamespaces(
            array(
                'Ishgo\Index\Controllers' => APP_PATH . '/index/controllers/',
                'Ishgo\Index\Models'      => APP_PATH . '/index/models/',
            )
        );

        $loader->register();
    }

    /**
     * Register specific services for the module
     */
    public function registerServices($di)
    {

        //Registering a dispatcher
        $di->set('dispatcher', function() {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('Ishgo\Index\Controllers');
            return $dispatcher;
        });

        //Registering the view component
        $di->set('view', function() {
            $view = new View();
            $view->setViewsDir(APP_PATH . '/index/views/');
            return $view;
        });
    }

}