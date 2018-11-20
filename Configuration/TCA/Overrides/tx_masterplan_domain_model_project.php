<?php
call_user_func(function($extConf) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
        'masterplan',
        'tx_masterplan_domain_model_project',
        'area_of_activity',
        [
            'label' => 'LLL:EXT:masterplan/Resources/Private/Language/locallang_db.xlf:tx_masterplan_domain_model_project.area_of_activity',
            'fieldConfiguration' => [
                'treeConfig' => [
                    'rootUid' => $extConf['rootCategory']
                ]
            ]
        ]
    );

    // Add tx_maps2_uid column to project table
    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('maps2')) {
        \JWeiland\Maps2\Tca\Maps2Registry::getInstance()->add(
            'masterplan',
            'tx_masterplan_domain_model_project'
        );
    }
}, unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['masterplan']));
