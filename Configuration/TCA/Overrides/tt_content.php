<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
if (!defined('TYPO3')) {
    die('Access denied.');
}

ExtensionUtility::registerPlugin(
    'Masterplan',
    'Masterplan',
    'LLL:EXT:masterplan/Resources/Private/Language/locallang_db.xlf:plugin.masterplan.title'
);
