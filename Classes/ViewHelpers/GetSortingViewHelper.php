<?php
declare(strict_types = 1);
namespace JWeiland\Masterplan\ViewHelpers;

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

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A ViewHelper to get a sorted array
 */
class GetSortingViewHelper extends AbstractViewHelper
{
    /**
     * Get sorting parameters as array
     *
     * @param string $currentSortBy
     * @param string $sortBy
     * @param string $direction
     * @param int $areaOfActivity
     * @return array
     */
    public function render(string $currentSortBy, string $sortBy, string $direction, int $areaOfActivity): array
    {
        if ($currentSortBy === $sortBy) {
            $direction = $direction === 'asc' ? 'desc' : 'asc';
        }
        return [
            'sortBy' => $sortBy,
            'direction' => $direction,
            'areaOfActivity' => $areaOfActivity
        ];
    }
}
