<?php declare(strict_types=1);
namespace JWeiland\Masterplan\Controller;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

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
     * inject project repository
     *
     * @param ProjectRepository $projectRepository
     */
    public function injectProjectRepository(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * action show
     *
     * @param int $project
     */
    public function showAction(int $project)
    {
        $projectObject = $this->projectRepository->findByIdentifier($project);
        $this->view->assign('project', $projectObject);
    }
}
