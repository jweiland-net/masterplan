<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/jw-forms.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Update;

use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\AbstractListTypeToCTypeUpdate;

/**
 * With TYPO3 13 all plugins have to be declared as content elements (CType) insteadof "list_type"
 */
#[UpgradeWizard('masterplan_migratePluginsToContentElementsUpdate')]
class PluginToContentElementUpdate extends AbstractListTypeToCTypeUpdate
{
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'masterplan_masterplan' => 'masterplan_masterplan',
        ];
    }

    public function getTitle(): string
    {
        return 'EXT:masterplan - Migrate plugins to Content Elements';
    }

    public function getDescription(): string
    {
        return 'The modern way to register plugins for TYPO3 is to register them as content element types. ' .
            'Running this wizard will migrate all jw_forms plugins to content element (CType)';
    }
}
