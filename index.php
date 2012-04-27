<?php

    require_once ('app/Controller.class.php');
    require_once ('app/Registry.class.php');
    require_once ('app/Router.class.php');
    require_once ('app/View.class.php');
    require_once ('app/Request.class.php');
    require_once ('app/Auth.class.php');
    require_once ('lib/userlist.class.php');


    define('SITE_ROOT', realpath(dirname(__FILE__)) );

    $registry = new Registry();

    $registry->router = new Router($registry);
    $registry->router->setPath(SITE_ROOT . '/controller/');

    $registry->view = new View($registry);

    $registry->request = new Request($registry);
    $registry->auth    = new Auth($registry);

    $registry->router->classLoader();

?>

