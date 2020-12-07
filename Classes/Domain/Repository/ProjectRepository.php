<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Main repository to retrieve project records.
 */
class ProjectRepository extends Repository
{
    public function findAllSorted(int $areaOfActivity, string $sortBy, string $direction): QueryResultInterface
    {
        // check if values are valid and process query
        if (
            GeneralUtility::inList('title,start_date,citizen_participation,area_of_activity', $sortBy)
            && GeneralUtility::inList('asc,desc', $direction)
        ) {
            $sortBy = GeneralUtility::underscoredToLowerCamelCase($sortBy);
            $sortBy = $sortBy === 'areaOfActivity' ? 'areaOfActivity.title' : $sortBy;
            $query = $this->createQuery();
            // reduce result to a given area of activity
            if ($areaOfActivity > 0) {
                $query->matching($query->contains('areaOfActivity', $areaOfActivity));
            }
            $query->setOrderings([$sortBy => strtoupper($direction)]);
        } else {
            return $this->findAll();
        }
        return $query->execute();
    }
}
