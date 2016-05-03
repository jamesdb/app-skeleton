<?php

use League\Container\Container;

$container = new Container;

$container->add(App\Controller\MainController::class);

$container
    ->addServiceProvider(App\ServiceProvider\ZendDiactorosServiceProvider::class)
    ->addServiceProvider(App\ServiceProvider\TwigServiceProvider::class)
;

return $container;
