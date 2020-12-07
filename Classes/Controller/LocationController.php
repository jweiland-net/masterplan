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
 * The main controller to transfer location records from DB to View
 */
class LocationController extends ActionController
{
    /**
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
     * @param int $project
     */
    public function showAction(int $project)
    {
        $projectObject = $this->projectRepository->findByIdentifier($project);
        $this->view->assign('project', $projectObject);
    }
}
