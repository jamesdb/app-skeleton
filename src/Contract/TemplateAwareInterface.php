<?php

namespace App\Contract;

use Twig_Environment;

interface TemplateAwareInterface
{
    /**
     * Get the template driver.
     *
     * @param \Twig_Environment $twig
     */
    public function setTemplateDriver(Twig_Environment $twig);

    /**
     * Get the template driver.
     *
     * @return \Twig_Environment
     */
    public function getTemplateDriver();
}
