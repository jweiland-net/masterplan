<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Helper;

use TYPO3\CMS\Core\DataHandling\SlugHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/*
 * Helper class to generate a path segment (slug) for a project record.
 */
class PathSegmentHelper
{
    /**
     * @var SlugHelper
     */
    protected $slugHelper;

    public function __construct(SlugHelper $slugHelper = null)
    {
        if ($slugHelper === null) {
            // Add uid to slug, to prevent duplicates
            $config = $GLOBALS['TCA']['tx_masterplan_domain_model_project']['columns']['path_segment']['config'];
            $config['generatorOptions']['fields'] = ['title', 'uid'];

            $slugHelper = GeneralUtility::makeInstance(
                SlugHelper::class,
                'tx_masterplan_domain_model_project',
                'path_segment',
                $config
            );
        }
        $this->slugHelper = $slugHelper;
    }

    public function generatePathSegment(
        array $baseRecord,
        int $pid
    ): string {
        return $this->slugHelper->generate(
            $baseRecord,
            $pid
        );
    }
}
