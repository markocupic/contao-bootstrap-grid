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
use Contao\CoreBundle\Fragment\Reference\ContentElementReference;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\StringUtil;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'bootstrap_grid', nestedFragments: true)]
class BootstrapRowController extends AbstractContentElementController
{
    public const string TYPE = 'bootstrap_row';

    public function __construct(
        private readonly ContaoFramework $framework,
        #[Autowire(param: 'markocupic_contao_bootstrap_grid.row_classes')]
        private readonly array $rowClasses,
    ) {
    }

    public function __invoke(Request $request, ContentModel $model, string $section, array|null $classes = null): Response
    {
        $classes = $classes ?? [];

        return parent::__invoke($request, $model, $section, $this->addGridClasses($classes, $model));
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        $elements = [];

        /** @var ContentElementReference $reference */
        foreach ($template->get('nested_fragments') as $i => $reference) {
            $nestedModel = $reference->getContentModel();

            if (!$nestedModel instanceof ContentModel) {
                $nestedModel = $this->framework->getAdapter(ContentModel::class)->findById($nestedModel);
            }

           // $header = StringUtil::deserialize($nestedModel->sectionHeadline, true);

            $elements[] = [
                //'header' => $header['value'] ?? '',
                //'header_tag' => $header['unit'] ?? 'h2',
                'reference' => $reference,
                //'is_open' => !$model->closeSections && 0 === $i,
            ];
        }

        $template->set('elements', $elements);

        return $template->getResponse();
    }

    protected function addGridClasses(array $classes, ContentModel $model): null|array
    {
        $gridClasses = StringUtil::deserialize($model->cbg_gridClasses, true);
        $customClasses = StringUtil::trimsplit(' ', $model->cbg_customRowClasses);

        return array_filter(array_unique(array_merge($classes, $this->rowClasses, $gridClasses, $customClasses)));
    }
}
