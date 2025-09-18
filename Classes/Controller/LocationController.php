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
use JWeiland\Masterplan\Domain\Repository\ProjectRepository;

/**
 * The main controller to transfer location records from DB to View
 */
class LocationController extends AbstractController
{
    protected ProjectRepository $projectRepository;

    /**
     * @param ProjectRepository $projectRepository
     */
    public function injectProjectRepository(ProjectRepository $projectRepository): void
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @param int $project
     * @return ResponseInterface
     */
    public function showAction(int $project): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'project' => $this->projectRepository->findByIdentifier($project)
        ]);
        return $this->htmlResponse();
    }
}
