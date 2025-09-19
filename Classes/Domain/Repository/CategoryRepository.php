<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Domain\Repository;

use JWeiland\Masterplan\Configuration\ExtConf;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Our own Repository for Categories (sys_category) because we need another sorting
 */
class CategoryRepository extends Repository
{
    protected $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * Returns the child categories (area of activities) of configured root category
     *
     * @return array
     */
    public function getAreaOfActivities(): array
    {
        $extConf = GeneralUtility::makeInstance(ExtConf::class);
        return $this->findByParent($extConf->getRootCategory())->toArray();
    }
}
