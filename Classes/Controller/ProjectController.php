<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Controller;

use Psr\Http\Message\ResponseInterface;
use JWeiland\Masterplan\Domain\Repository\CategoryRepository;
use JWeiland\Masterplan\Domain\Repository\ProjectRepository;
use TYPO3\CMS\Extbase\Annotation as Extbase;

/**
 * The main controller to show and list projects
 */
class ProjectController extends AbstractController
{
    protected ProjectRepository $projectRepository;

    protected CategoryRepository $categoryRepository;

    public function __construct(
        ProjectRepository $projectRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function initializeAction(): void
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to null
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
        if (empty($this->settings['pidOfLocationPage'])) {
            $this->settings['pidOfLocationPage'] = null;
        }
        if (empty($this->settings['pidOfListPage'])) {
            $this->settings['pidOfListPage'] = null;
        }
    }

    /**
     * @param int $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     *
     * @return ResponseInterface
     */
    #[Extbase\Validate(['param' => 'sortBy', 'validator' => 'RegularExpression', 'options' => ['regularExpression' => '/title|start_date|citizen_participation|area_of_activity/']])]
    #[Extbase\Validate(['param' => 'direction', 'validator' => 'RegularExpression', 'options' => ['regularExpression' => '/asc|desc/']])]
    public function listAction(int $areaOfActivity = 0, string $sortBy = 'title', string $direction = 'asc'): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'projects' => $this->projectRepository->findAllSorted($areaOfActivity, $sortBy, $direction),
            'areaOfActivities' => $this->categoryRepository->getAreaOfActivities(),
            'areaOfActivity' => $areaOfActivity,
            'sortBy' => $sortBy,
            'direction' => $direction,
        ]);
        return $this->htmlResponse();
    }

    /**
     * @param int $project
     * @return ResponseInterface
     */
    public function showAction(int $project): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'project' => $this->projectRepository->findByIdentifier($project),
        ]);
        return $this->htmlResponse();
    }
}
