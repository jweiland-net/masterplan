<?php

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Maps2\Tca\Maps2Registry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(function () {
    $GLOBALS['TCA']['tx_masterplan_domain_model_project']['columns']['area_of_activity'] = [
        'label' => 'LLL:EXT:masterplan/Resources/Private/Language/locallang_db.xlf:tx_masterplan_domain_model_project.area_of_activity',
        'config' => [
            'type' => 'category',
        ],
    ];

    ExtensionManagementUtility::addToAllTCAtypes(
        'tx_masterplan_domain_model_project',
        'area_of_activity',
    );

    // Add tx_maps2_uid column to project table
    if (ExtensionManagementUtility::isLoaded('maps2')) {
        Maps2Registry::getInstance()->add(
            'masterplan',
            'tx_masterplan_domain_model_project',
        );
    }
});
