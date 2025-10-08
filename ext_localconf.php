<?php

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

if (!defined('TYPO3')) {
    die('Access denied.');
}

use JWeiland\Masterplan\Controller\LocationController;
use JWeiland\Pfprojects\Controller\ProjectController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(static function () {
    ExtensionUtility::configurePlugin(
        'Masterplan',
        'Masterplan',
        [
            ProjectController::class => 'list, show',
            LocationController::class => 'show',
        ],
        // non-cacheable actions
        [
            ProjectController::class => '',
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );
});
