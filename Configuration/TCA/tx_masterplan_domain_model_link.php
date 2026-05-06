<?php

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

return [
    'ctrl' => [
        'title' => 'LLL:EXT:masterplan/Resources/Private/Language/locallang_db.xlf:tx_masterplan_domain_model_link',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title',
        'iconfile' => 'EXT:masterplan/Resources/Public/Icons/tx_masterplan_domain_model_link.svg',
    ],
    'types' => [
        '1' => [
            'showitem' => '--palette--;;languageHidden, title, link,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access',
        ],
    ],
    'palettes' => [
        'languageHidden' => ['showitem' => 'sys_language_uid, l10n_parent, hidden'],
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ],
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:masterplan/Resources/Private/Language/locallang_db.xlf:tx_masterplan_domain_model_link.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'link' => [
            'label' => 'LLL:EXT:masterplan/Resources/Private/Language/locallang_db.xlf:tx_masterplan_domain_model_link.link',
            'config' => [
                'type' => 'link',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'project' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
