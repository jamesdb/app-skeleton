<?php

namespace App\ServiceProvider;

use App\Contract\TemplateAwareInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Twig_Environment;
use Twig_Loader_Filesystem;

class TwigServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @var array
     */
    protected $provides = [
        Twig_Environment::class
    ];

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this
            ->getContainer()
            ->inflector(TemplateAwareInterface::class)
            ->invokeMethod('setTemplateDriver', [Twig_Environment::class]);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getContainer()->share(Twig_Environment::class, function () {
            $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../templates');
            $twig = new Twig_Environment($loader);

            return $twig;
        });
    }
}
