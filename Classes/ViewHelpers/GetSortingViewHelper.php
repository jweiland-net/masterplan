<?php

declare(strict_types = 1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A ViewHelper to get a sorted array
 */
class GetSortingViewHelper extends AbstractViewHelper
{
    public function initializeArguments(): void
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
