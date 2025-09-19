<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Domain model for categories.
 */
class Category extends AbstractEntity
{
    protected string $title;

    /**
     * @var Category|null
     */
    #[Lazy]
    protected ?Category $parent = null;

    /**
     * Target is not part of persistence.
     * It will be filled manually over projects->getAreaOfActivity
     *
     * @var ObjectStorage
     */
    protected ObjectStorage $targets;

    /**
     * SF: The "target" property is not part of persistence and will therefore not be filled by DataMapper
     * with an ObjectStorage. Further DataMapper prevents calling the constructor of domain models, that's why we
     * have to initialize the target property manually here.
     */
    public function initializeObject(): void
    {
        $this->targets = new ObjectStorage();
    }

    public function getTargets(): ObjectStorage
    {
        return $this->targets;
    }

    public function setTargets(ObjectStorage $targets): void
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getParent(): ?Category
    {
        return $this->parent;
    }

    public function setParent(?Category $parent): void
    {
        $this->parent = $parent;
    }
}
