<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

// load configurations and helper functions
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'config' . DS . 'env.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

//Autoload classes
spl_autoload_register(function ($className) {
    if (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'core' . DS . $className . '.php');
    } elseif (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php');
    } elseif (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php');
    } else {
        include(ROOT . DS . 'app' . DS . 'views' . DS . 'home' . DS . '404' . '.php');
        die();
    }
});
session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

$db = DB::getInstance(HOST,DB_NAME,DB_USER,DB_PASSWORD);

// route the request
Router:: route($url);