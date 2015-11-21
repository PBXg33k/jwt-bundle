<?php
/*
 * This file is part of the KleijnWeb\JwtBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KleijnWeb\JwtBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author John Kleijn <john@kleijnweb.nl>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jwt');

        $rootNode
            ->children()
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('keys')
                        ->requiresAtLeastOneElement()
                        ->useAttributeAsKey('name')
                        ->prototype('array')
                            ->children()
                                ->scalarNode('issuer')->isRequired()->end()
                                ->scalarNode('secret')->isRequired()->end()
                                ->scalarNode('type')->defaultValue('HS256')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()

            ;
        return $treeBuilder;
    }
}
