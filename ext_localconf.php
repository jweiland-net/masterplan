<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

call_user_func(function($extKey) {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'JWeiland.' . $extKey,
        'Masterplan',
        [
            'Project' => 'list, show',
            'Location' => 'show'
        ],
        // non-cacheable actions
        [
            'Project' => '',
        ]
    );
}, $_EXTKEY);
