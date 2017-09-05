<?php
namespace JWeiland\Masterplan\Domain\Repository;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Stefan Froemken <projects@jweiland.net>, www.jweiland.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * The repository for Projects
 */
class ProjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * find all records sorted by given parameters
	 *
	 * @param integer $areaOfActivity
	 * @param string $sortBy
	 * @param string $direction
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findAllSorted($areaOfActivity, $sortBy, $direction) {
		/** @var \TYPO3\CMS\Frontend\Page\PageRepository $pageRepository */
		$pageRepository = $GLOBALS['TSFE']->sys_page;
		/** @var \TYPO3\CMS\Extbase\Persistence\Generic\Query $query */
		$query = $this->createQuery();

		// reduce result to a given area of activity
		$additionalWhere = '';
		if ($areaOfActivity > 0) {
			$additionalWhere = ' AND sys_category.uid=' . (int)$areaOfActivity;
		}

		// check if values are valid and process query
		if (GeneralUtility::inList('title,start_date,citizen_participation,area_of_activity', $sortBy) && GeneralUtility::inList('asc,desc', $direction)) {
			$sortBy = $sortBy === 'area_of_activity' ? 'sys_category.title' : 'tx_masterplan_domain_model_project.' . $sortBy;
			$sql = 'SELECT ###SELECT###
				FROM tx_masterplan_domain_model_project
				LEFT JOIN sys_category_record_mm
				ON sys_category_record_mm.uid_foreign = tx_masterplan_domain_model_project.uid
				LEFT JOIN sys_category
				ON sys_category_record_mm.uid_local = sys_category.uid
				WHERE sys_category_record_mm.tablenames=?
				AND sys_category_record_mm.fieldname=?
				AND tx_masterplan_domain_model_project.pid IN (?)' .
				$additionalWhere .
				$pageRepository->enableFields('tx_masterplan_domain_model_project') .
				$pageRepository->enableFields('sys_category') . '
				GROUP BY tx_masterplan_domain_model_project.uid
				ORDER BY ' . $sortBy . ' ' . strtoupper($direction) . '
				###LIMIT###';
			$query->statement($sql, array(
				'tx_masterplan_domain_model_project',
				'area_of_activity',
				implode(',', $query->getQuerySettings()->getStoragePageIds())
			));
		} else {
			// if something went wrong, then return all records
			return $this->findAll();
		}
		return $query->execute();
	}

}