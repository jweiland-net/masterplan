<?php
namespace JWeiland\Masterplan\Controller;

/***************************************************************
 *  Copyright notice
 *  (c) 2014 Stefan Froemken <projects@jweiland.net>, www.jweiland.net
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * ProjectController
 */
class ProjectController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * projectRepository
     *
     * @var \JWeiland\Masterplan\Domain\Repository\ProjectRepository
     */
    protected $projectRepository;

    /**
     * inject project repository
     *
     * @param \JWeiland\Masterplan\Domain\Repository\ProjectRepository $projectRepository
     * @return void
     */
    public function injectProjectRepository(\JWeiland\Masterplan\Domain\Repository\ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function initializeAction()
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
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
     * action list
     *
     * @param integer $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     * @validate $sortBy RegularExpression(regularExpression=/title|start_date|citizen_participation|area_of_activity/)
     * @validate $direction RegularExpression(regularExpression=/asc|desc/)
     * @return void
     */
    public function listAction($areaOfActivity = 0, $sortBy = 'title', $direction = 'asc')
    {
        $projects = $this->projectRepository->findAllSorted($areaOfActivity, $sortBy, $direction);
        $this->view->assign('projects', $projects);
        $this->view->assign('areaOfActivity', $areaOfActivity);
        $this->view->assign('sortBy', $sortBy);
        $this->view->assign('direction', $direction);
    }

    /**
     * action show
     *
     * @param integer $project
     * @return void
     */
    public function showAction($project)
    {
        $projectObject = $this->projectRepository->findByIdentifier($project);
        $this->view->assign('project', $projectObject);
    }

}
