<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\EventListener;

use JWeiland\Masterplan\Event\PostProcessFluidVariablesEvent;
use JWeiland\Masterplan\Pagination\RequestPagination;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;

class AddPaginatorEventListener extends AbstractControllerEventListener
{
    protected int $itemsPerPage = 15;

    protected $allowedControllerActions = [
        'Project' => [
            'list',
        ],
    ];

    public function __invoke(PostProcessFluidVariablesEvent $event): void
    {
        if ($this->isValidRequest($event)) {
            $paginator = new QueryResultPaginator(
                $event->getFluidVariables()['projects'],
                $this->getCurrentPage($event),
                $this->getItemsPerPage($event),
            );

            $event->addFluidVariable('actionName', $event->getActionName());
            $event->addFluidVariable('paginator', $paginator);
            $event->addFluidVariable('projects', $paginator->getPaginatedItems());
            $event->addFluidVariable('pagination', new RequestPagination($paginator));
        }
    }

    protected function getCurrentPage(PostProcessFluidVariablesEvent $event): int
    {
        $currentPage = 1;
        if ($event->getRequest()->hasArgument('currentPage')) {
            // $currentPage have to be positive and greater than 0
            // See: AbstractPaginator::setCurrentPageNumber()
            $currentPage = MathUtility::forceIntegerInRange(
                (int)$event->getRequest()->getArgument('currentPage'),
                1,
            );
        }

        return $currentPage;
    }

    protected function getItemsPerPage(PostProcessFluidVariablesEvent $event): int
    {
        $itemsPerPage = $event->getSettings()['pageBrowser']['itemsPerPage'] ?? $this->itemsPerPage;
        return (int)$itemsPerPage;
    }
}
