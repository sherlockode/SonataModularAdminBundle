<?php

namespace Sherlockode\SonataModularBundle\Twig\Extension;

use Symfony\Bundle\TwigBundle\DependencyInjection\TwigExtension;

class ModularExtension extends \Twig_Extension
{
    /**
     * @var array
     */
    private $modularClass;

    /**
     * @param array $modularClass
     */
    public function __construct($modularClass)
    {
        $this->modularClass = $modularClass;
    }

    /**
     * @return array|\Twig_Function[]
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('get_modular_class', [$this, 'getModularClass']),
        ];
    }

    /**
     * @return string
     */
    public function getModularClass()
    {
        $class = [];
        if (isset($this->modularClass['sidebar'])) {
            $class[] = 'sidebar-fixed';
        }

        if (isset($this->modularClass['header'])) {
            $class[] = 'header-fixed';
        }

        if (isset($this->modularClass['footer'])) {
            $class[] = 'footer-fixed';
        }

        return implode(' ', $class);
    }
}
