<?php

namespace App\Test;

use App\Controller\MainController;

class MainControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Enusre MainController::index is returning correct response.
     *
     * @return void
     */
    public function testMainControllerIndexReturnsResponse()
    {
        $streamMock   = $this->getMock('Psr\Http\Message\StreamInterface');
        $requestMock  = $this->getMock('Psr\Http\Message\ServerRequestInterface');
        $responseMock = $this->getMock('Psr\Http\Message\ResponseInterface');
        $twigMock     = $this->getMock('Twig_Environment');

        $streamMock
            ->expects($this->once())
            ->method('write')
            ->with('<h1>Hello, World! ;D</h1>');

        $responseMock
            ->expects($this->once())
            ->method('getBody')
            ->will($this->returnValue($streamMock));

        $twigMock
            ->expects($this->once())
            ->method('render')
            ->with($this->equalTo('index.html'), $this->equalTo(['smiley' => ';D']))
            ->will($this->returnValue('<h1>Hello, World! ;D</h1>'));

        $controller = new MainController;
        $controller->setTemplateDriver($twigMock);

        $response = $controller->index($requestMock, $responseMock);

        $this->isInstanceOf('Psr\Http\Message\Response', $response);
    }
}
