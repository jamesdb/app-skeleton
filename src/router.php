<?php

use League\Container\Container;
use League\Container\ContainerInterface;
use League\Route\RouteCollection;

$router = new RouteCollection(
    ($container instanceof ContainerInterface) ? $container : new Container
);

$router->get('/', 'App\Controller\MainController::index');

return $router;
