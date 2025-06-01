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

namespace Markocupic\ContaoBootstrapGrid\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\StringUtil;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'bootstrap_grid', nestedFragments: true)]
class BootstrapColumnController extends AbstractContentElementController
{
    public const string TYPE = 'bootstrap_column';

    public function __construct(
        #[Autowire(param: 'markocupic_contao_bootstrap_grid.row_classes')]
        private readonly array $rowClasses,
    ) {
    }

    public function __invoke(Request $request, ContentModel $model, string $section, array|null $classes = null): Response
    {
        $classes = $classes ?? [];

        return parent::__invoke($request, $model, $section, $this->addColumnClasses($classes, $model));
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        //$template->innerClasses = StringUtil::trimsplit(' ', $this->cbg_columnCustomInnerClasses);

        return $template->getResponse();
    }

    protected function addColumnClasses(array $classes, ContentModel $model): null|array
    {
        $columnClasses = StringUtil::deserialize($model->cbg_columnClasses, true);

        if(empty($columnClasses[0])){
            return $classes;
        }
        foreach ($columnClasses[0] as $value){
            if(!empty($value)){
                $classes[] = $value;
            }
        }

        return $classes;

        //$classes[] = $columnClasses[0];


        //die(print_r($columnClasses, true));
        //$customClasses = StringUtil::trimsplit(' ', $model->cbg_columnCustomClasses);

        //return array_filter(array_unique(array_merge($classes, $this->rowClasses, $columnClasses, $customClasses)));
    }
}
