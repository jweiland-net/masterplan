<?php
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

/**
 * LocationController
 */
class LocationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
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