<?php declare(strict_types=1);
namespace JWeiland\Masterplan\Domain\Repository;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Main repository to retrieve project records.
 */
class ProjectRepository extends Repository
{
    /**
     * find all records sorted by given parameters
     *
     * @param int $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findAllSorted(int $areaOfActivity, string $sortBy, string $direction)
    {
        // check if values are valid and process query
        if (
            GeneralUtility::inList('title,start_date,citizen_participation,area_of_activity', $sortBy) &&
            GeneralUtility::inList('asc,desc', $direction)
        ) {
            $sortBy = $sortBy === 'area_of_activity' ? 'sys_category.title' : $sortBy;
            $query = $this->createQuery();
            // reduce result to a given area of activity
            if ($areaOfActivity > 0) {
                $query->matching($query->contains('areaOfActivity', $areaOfActivity));
            }
            $query->setOrderings([$sortBy => strtoupper($direction)]);

        } else {
            // if something went wrong, then return all records
            return $this->findAll();
        }
        return $query->execute();
    }
}
