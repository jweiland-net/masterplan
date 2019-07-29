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
     * Initialize all VH arguments
     */
    public function initializeArguments()
    {
        $this->registerArgument(
            'currentSortBy',
            'string',
            'Set the column name where the resultset is currently sorted by',
            true
        );
        $this->registerArgument(
            'sortBy',
            'string',
            'Set the column name where the resultset should be sorted by',
            true
        );
        $this->registerArgument(
            'direction',
            'string',
            'Set direction of sorting. Should be ASC or DESC.',
            true
        );
        $this->registerArgument(
            'areaOfActivity',
            'int',
            'Set the area of activity',
            true
        );
    }

    /**
     * Get sorting parameters as array
     *
     * @return array
     */
    public function render(): array
    {
        if ($this->arguments['currentSortBy'] === $this->arguments['sortBy']) {
            $direction = $this->arguments['direction'] === 'asc' ? 'desc' : 'asc';
        }
        return [
            'sortBy' => $this->arguments['sortBy'],
            'direction' => $this->arguments['direction'],
            'areaOfActivity' => $this->arguments['areaOfActivity']
        ];
    }
}
