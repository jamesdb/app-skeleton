<?php

namespace App\Contract;

use Twig_Environment;

trait TemplateAwareTrait
{
    /**
     * @var \Twig_Environment
     */
    protected $template;

    /**
     * {@inheritdoc}
     */
    public function setTemplateDriver(Twig_Environment $twig)
    {
        $this->template = $twig;
    }

    /**
     * {@inheritdoc}
     */
    public function getTemplateDriver()
    {
        return $this->template;
    }
}
