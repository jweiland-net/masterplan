<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use JWeiland\Masterplan\Controller\LocationController;
use JWeiland\Masterplan\Updater\MasterplanSlugUpdater;
use JWeiland\Pfprojects\Controller\ProjectController;

call_user_func(static function () {
    ExtensionUtility::configurePlugin(
        'Masterplan',
        'Masterplan',
        [
            ProjectController::class => 'list, show',
            LocationController::class => 'show'
        ],
        // non-cacheable actions
        [
            ProjectController::class => '',
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );

    // Add masterplan plugin to new element wizard
    ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:masterplan/Configuration/TSconfig/ContentElementWizard.txt">'
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['masterplanUpdateSlug']
        = MasterplanSlugUpdater::class;
});
