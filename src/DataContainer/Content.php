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

namespace Markocupic\ContaoBootstrapGrid\DataContainer;

use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\Translation\TranslatorInterface;

#[Autoconfigure(public: true)]
readonly class Content
{
    public function __construct(
        private readonly TranslatorInterface $translator,
        #[Autowire(param: 'markocupic_contao_bootstrap_grid.column_breakpoints')]
        private array $columnBreakpoints,
        #[Autowire(param: 'markocupic_contao_bootstrap_grid.column_sizes')]
        private array $columnSizes,
    ) {
    }

    public function getColumnBreakpointInputs(): array
    {
        $columns = [];
        foreach ($this->columnBreakpoints as $breakpoint) {
            $columns[$breakpoint] = $this->getColumnDCA($breakpoint);
        }

        return $columns;
    }

    public function getColumnDCA(string $breakpoint): array
    {
        return [
            'exclude'   => true,
            'inputType' => 'select',
            'eval'      => [
                'style'              => 'width:50px',
                'includeBlankOption' => true,
            ],
            'options'   => $this->getOptions($breakpoint),
        ];
    }

    public function getOptions(string $breakpoint): array
    {
        $options = [];

        $options['d-'.$breakpoint.'-none'] = $this->translator->trans('MSC.hide_column', [], 'contao_default');

        foreach ($this->columnSizes as $size) {
            $options['col-'.$breakpoint.'-'.$size] = $size;
        }

        return $options;
    }

}
