<?php

declare(strict_types = 1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Controller;

use JWeiland\Masterplan\Domain\Repository\ProjectRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * The main controller to show and list projects
 */
class ProjectController extends ActionController
{
    /**
     * projectRepository
     *
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * @param ProjectRepository $projectRepository
     */
    public function injectProjectRepository(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Initializes the controller before invoking an action method.
     */
    public function initializeAction()
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
     * Action list
     *
     * @param int $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     * @validate $sortBy RegularExpression(regularExpression=/title|start_date|citizen_participation|area_of_activity/)
     * @validate $direction RegularExpression(regularExpression=/asc|desc/)
     */
    public function listAction(int $areaOfActivity = 0, string $sortBy = 'title', string $direction = 'asc')
    {
        $projects = $this->projectRepository->findAllSorted($areaOfActivity, $sortBy, $direction);
        $this->view->assign('projects', $projects);
        $this->view->assign('areaOfActivity', $areaOfActivity);
        $this->view->assign('sortBy', $sortBy);
        $this->view->assign('direction', $direction);
    }

    /**
     * Action show
     *
     * @param int $project
     */
    public function showAction(int $project)
    {
        $projectObject = $this->projectRepository->findByIdentifier($project);
        $this->view->assign('project', $projectObject);
    }
}
