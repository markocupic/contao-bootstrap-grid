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

use Markocupic\ContaoBootstrapGrid\Controller\ContentElement\BootstrapRowController;
use Markocupic\ContaoBootstrapGrid\Controller\ContentElement\BootstrapColumnController;

$GLOBALS['TL_LANG']['CTE']['bootstrap_grid'] = 'Bootstrap Grid';

// Content elements
$GLOBALS['TL_LANG']['CTE'][BootstrapRowController::TYPE] = ['Bootstrap Row (Spaltenset)', 'Bootstrap Row (Spaltenset)'];
$GLOBALS['TL_LANG']['CTE'][BootstrapColumnController::TYPE] = ['Bootstrap Spalte', 'Bootstrap Spalte'];


// Misc
$GLOBALS['TL_LANG']['MSC']['hide_column'] = 'Spalte ausblenden';
