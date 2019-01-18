<?php

namespace Sherlockode\SonataModularBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sherlockode_sonata_modular');

        $rootNode
            ->children()
                ->scalarNode('color')
                    ->defaultValue('green')
                    ->info('The admin color')
                ->end()
                ->scalarNode('fixed')
                    ->children()
                        ->scalarNode('sidebar')
                            ->defaultValue('false')
                            ->info('Define if the footer is fixed')
                        ->end()
                        ->scalarNode('header')
                            ->defaultValue('false')
                            ->info('Define if the header is fixed')
                        ->end()
                        ->scalarNode('footer')
                            ->defaultValue('false')
                            ->info('Define if the footer is fixed')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
