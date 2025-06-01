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

use Contao\System;
use Markocupic\ContaoBootstrapGrid\Controller\ContentElement\BootstrapRowController;
use Markocupic\ContaoBootstrapGrid\Controller\ContentElement\BootstrapColumnController;
use Markocupic\ContaoBootstrapGrid\DataContainer\Content;

$GLOBALS['TL_DCA']['tl_content']['palettes'][BootstrapRowController::TYPE] = '{type_legend},type;{cbg_gutter_legend},cbg_gutterClasses,cbg_customRowClasses;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes'][BootstrapColumnController::TYPE] = '{type_legend},type;{cbg_column_legend},cbg_columnClasses,cbg_columnCustomClasses.cbg_columnCustomInnerClasses;{template_legend:hide},cbg_columnInnerClasses;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

/*
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['cbg_gutterClasses'] = [
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('markocupic_contao_bootstrap_grid.gutter_classes'),
    'eval'      => ['multiple' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql'       => "blob NULL",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['cbg_customRowClasses'] = [
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => ['type' => 'string', 'length' => 255, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['cbg_columnClasses'] = [
    'exclude'   => true,
    'inputType' => 'multiColumnWizard',
    'eval'      => [
        'maxCount'        => 1,
        'buttons'         => [
            'up'     => false,
            'down'   => false,
            'move'   => false,
            'new'    => false,
            'copy'   => false,
            'delete' => false,
        ],
        'columnsCallback' => [Content::class, 'getColumnBreakpointInputs'],
        'sql'             => "blob NULL",
    ],
    'sql'       => "blob NULL",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['cbg_columnCustomClasses'] = [
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => ['type' => 'string', 'length' => 255, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['cbg_columnCustomInnerClasses'] = [
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => ['type' => 'string', 'length' => 255, 'default' => ''],
];
