<?php
namespace JWeiland\Masterplan\Persistence\Generic\Storage;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Stefan Froemken <projects@jweiland.net>, jweiland.net
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

use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Exception;
use TYPO3\CMS\Extbase\Persistence\Generic\Qom;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * A Storage backend
 */
class Typo3DbBackend extends \TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbBackend {

	/**
	 * Returns the number of tuples matching the query.
	 *
	 * @param QueryInterface $query
	 * @return integer The number of matching tuple
	 */
	public function getObjectCountByQuery(QueryInterface $query) {
		// In case of a statement try to get the amount of records
		/** @var \TYPO3\CMS\Extbase\Persistence\Generic\Query $query */
		if ($query->getStatement() instanceof Qom\Statement) {
			$originalStatement = $query->getStatement()->getStatement();
			if (strpos($originalStatement, '###SELECT###') !== FALSE) {
				// first of all we have to clone our query object
				$clonedQuery = clone $query;
				$statement = str_replace('###SELECT###', 'COUNT(*)', $originalStatement);
				$statement = str_replace('###LIMIT###', '', $statement);
				$boundVariables = $clonedQuery->getStatement()->getBoundVariables();
				$rows = $clonedQuery->statement($statement, $boundVariables)->execute(TRUE);
				if (is_array($rows) && count($rows)) {
					$amountOfRows = 0;
					foreach ($rows as $row) {
						$amountOfRows += current($row);
					}
					return $amountOfRows;
				}
				return 0;
			}
		}
		return parent::getObjectCountByQuery($query);
	}

}
