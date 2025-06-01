<?php

declare(strict_types=1);

/*
 * This file is part of Contao Bootstrap Grid.
 *
 * (c) Marko Cupic <m.cupic@gmx.ch>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/contao-bootstrap-grid
 */

namespace Markocupic\ContaoBootstrapGrid\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public const ROOT_KEY = 'markocupic_contao_bootstrap_grid';

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(self::ROOT_KEY);
        $treeBuilder
            ->getRootNode()
            ->children()
                ->arrayNode('row_classes')
                    ->info('Allows to configure the row classes in the row element.')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                       'row',
                    ])
                ->end()
                ->arrayNode('gutter_classes')
                    ->info('Allows to configure the gutter classes in the row element.')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                        ...array_map(fn($var)=> 'g-'.$var,range(0,5)),
                        ...array_map(fn($var)=> 'gx-'.$var,range(0,5)),
                        ...array_map(fn($var)=> 'gy-'.$var,range(0,5)),
                    ])
                ->end()
                ->arrayNode('column_breakpoints')
                    ->info('Allows to configure the column breakpoints in the column element.')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                        'xs',
                        'sm',
                        'md',
                        'lg',
                        'xl',
                        'xxl',
                    ])
                ->end()
                ->arrayNode('column_sizes')
                    ->info('Allows to configure the column sizes in the column element.')
                    ->prototype('scalar')->end()
                    ->defaultValue(range(1,12))
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
