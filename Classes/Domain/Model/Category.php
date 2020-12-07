<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Domain\Model;

/**
 * Domain model for categories.
 */
class Category extends \TYPO3\CMS\Extbase\Domain\Model\Category
{
    /**
     * Target is not part of persistence.
     * It will be filled manually over projects->getAreaOfActivity
     *
     * @var \SplObjectStorage
     */
    protected $targets;

    public function __construct()
    {
        $this->targets = new \SplObjectStorage();
    }

    public function getTargets(): \SplObjectStorage
    {
        return $this->targets;
    }

    public function setTargets(\SplObjectStorage $targets): void
    {
        $this->targets = $targets;
    }

    public function addTarget(Category $target): void
    {
        $this->targets->attach($target);
    }

    public function removeTarget(Category $target): void
    {
        $this->targets->detach($target);
    }
}
