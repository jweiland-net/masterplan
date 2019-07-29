<?php
namespace JWeiland\Masterplan\ViewHelpers\Widget;

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

use JWeiland\Masterplan\ViewHelpers\Widget\Controller\PaginateController;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetViewHelper;

/**
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class PaginateViewHelper extends AbstractWidgetViewHelper
{
    /**
     * @var PaginateController
     */
    protected $controller;

    /**
     * inject controller
     *
     * @param PaginateController $controller
     * @return void
     */
    public function injectController(PaginateController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * @param QueryResultInterface $objects
     * @param string $as
     * @param int $maxRecords
     * @param array $configuration
     * @return string
     */
    public function render(
        QueryResultInterface $objects,
        string $as,
        int $maxRecords = 0,
        array $configuration = [
            'itemsPerPage' => 10,
            'insertAbove' => false,
            'insertBelow' => true,
            'maximumNumberOfLinks' => 99
        ]
    ) {
        return $this->initiateSubRequest();
    }
}
