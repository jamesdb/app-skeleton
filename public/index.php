<?php

use League\Route\Http\Exception\NotFoundException;

include __DIR__ . '/../vendor/autoload.php';

$container = include __DIR__ . '/../src/container.php';

$router = include __DIR__ . '/../src/router.php';

try {
    $response = $router->dispatch(
        $container->get('Zend\Diactoros\ServerRequest'),
        $container->get('Zend\Diactoros\Response')
    );
} catch (NotFoundException $e) {
    $response = $container->get('Zend\Diactoros\Response');
    $response->getBody()->write($e->getMessage());
    $response = $response->withStatus($e->getStatusCode());
}

$container->get('Zend\Diactoros\Response\SapiEmitter')->emit($response);
