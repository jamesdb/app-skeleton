<?php

namespace App\Controller;

use App\Contract\TemplateAwareInterface;
use App\Contract\TemplateAwareTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MainController implements TemplateAwareInterface
{
    use TemplateAwareTrait;

    /**
     * Application Index.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     * @param  \Psr\Http\Message\ResponseInterface      $response
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        $response->getBody()->write(
            $this->getTemplateDriver()->render('index.html', ['smiley' => ';D'])
        );

        return $response;
    }
}
