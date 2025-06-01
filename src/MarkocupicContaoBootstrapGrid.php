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

namespace Markocupic\ContaoBootstrapGrid;

use Markocupic\ContaoBootstrapGrid\DependencyInjection\MarkocupicContaoBootstrapGridExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MarkocupicContaoBootstrapGrid extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getContainerExtension(): MarkocupicContaoBootstrapGridExtension
    {
        return new MarkocupicContaoBootstrapGridExtension();
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }
}
