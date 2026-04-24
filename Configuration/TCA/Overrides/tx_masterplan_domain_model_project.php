<?php

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Maps2\Tca\Maps2Registry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

// Add the tx_maps2_uid column to the project table
if (ExtensionManagementUtility::isLoaded('maps2')) {
    Maps2Registry::getInstance()->add(
        'masterplan',
        'tx_masterplan_domain_model_project',
    );
}
