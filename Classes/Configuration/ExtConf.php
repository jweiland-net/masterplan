<?php

declare(strict_types = 1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Configuration;

use TYPO3\CMS\Core\SingletonInterface;

/**
 * This class will streamline the values from extension manager configuration
 */
class ExtConf implements SingletonInterface
{
    /**
     * @var int
     */
    protected $rootCategory = 0;

    public function __construct()
    {
        if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['masterplan'])) {
            // get global configuration
            $extConf = unserialize(
                $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['masterplan'],
                ['allowed_classes' => false]
            );
            if (is_array($extConf) && count($extConf)) {
                // call setter method foreach configuration entry
                foreach ($extConf as $key => $value) {
                    $methodName = 'set' . ucfirst($key);
                    if (method_exists($this, $methodName)) {
                        $this->$methodName($value);
                    }
                }
            }
        }
    }

    /**
     * @return int
     */
    public function getRootCategory(): int
    {
        return (int)$this->rootCategory;
    }

    /**
     * @param int $rootCategory
     */
    public function setRootCategory($rootCategory)
    {
        $this->rootCategory = (int)$rootCategory;
    }
}
