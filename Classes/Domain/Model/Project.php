<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Masterplan\Configuration\ExtConf;
use JWeiland\ServiceBw2\Utility\ModelUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Main domain model for projects.
 */
class Project extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $pathSegment = '';

    /**
     * @var string
     */
    protected $number = '';

    /**
     * @var string
     */
    protected $contactPerson = '';

    /**
     * Initially a string, but will be converted to an array with records when
     * calling getter the first time!
     *
     * @var string
     */
    protected $organisationseinheiten = '';

    /**
     * @var string
     */
    protected $startDate = '';

    /**
     * @var string
     */
    protected $endDate = '';

    /**
     * @var string
     */
    protected $costs = '';

    /**
     * @var bool
     */
    protected $citizenParticipation = false;

    /**
     * @var \SplObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var string
     */
    protected $furtherInformations = '';

    /**
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * @var \SplObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $files;

    /**
     * @var \SplObjectStorage<\JWeiland\Masterplan\Domain\Model\Link>
     */
    protected $links;

    /**
     * @var \SplObjectStorage<\JWeiland\Masterplan\Domain\Model\Category>
     */
    protected $areaOfActivity;

    public function __construct()
    {
        $this->images = new \SplObjectStorage();
        $this->files = new \SplObjectStorage();
        $this->links = new \SplObjectStorage();
        $this->areaOfActivity = new \SplObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPathSegment(): string
    {
        return $this->pathSegment;
    }

    public function setPathSegment(string $pathSegment): void
    {
        $this->pathSegment = $pathSegment;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getContactPerson(): string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(string $contactPerson): void
    {
        $this->contactPerson = $contactPerson;
    }

    public function getOrganisationseinheiten(): array
    {
        return $this->organisationseinheiten = ModelUtility::getOrganisationseinheiten($this->organisationseinheiten);
    }

    public function setOrganisationseinheiten(array $organisationseinheiten): void
    {
        $this->organisationseinheiten = $organisationseinheiten;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getCosts(): string
    {
        return $this->costs;
    }

    public function setCosts(string $costs): void
    {
        $this->costs = $costs;
    }

    public function isCitizenParticipation(): bool
    {
        return $this->citizenParticipation;
    }

    public function setCitizenParticipation(bool $citizenParticipation): void
    {
        $this->citizenParticipation = $citizenParticipation;
    }

    public function getImages(): \SplObjectStorage
    {
        return $this->images;
    }

    public function setImages(\SplObjectStorage $images): void
    {
        $this->images = $images;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getFurtherInformations(): string
    {
        return $this->furtherInformations;
    }

    public function setFurtherInformations(string $furtherInformations): void
    {
        $this->furtherInformations = $furtherInformations;
    }

    public function getTxMaps2Uid()
    {
        return $this->txMaps2Uid;
    }

    public function setTxMaps2Uid(PoiCollection $txMaps2Uid): void
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    public function getFiles(): \SplObjectStorage
    {
        return $this->files;
    }

    public function setFiles(\SplObjectStorage $files): void
    {
        $this->files = $files;
    }

    public function getLinks(): \SplObjectStorage
    {
        return $this->links;
    }

    public function setLinks(\SplObjectStorage $links): void
    {
        $this->links = $links;
    }

    /**
     * Returns all areaOfActivity
     * This includes the 1st level: areaOfActivity
     * and the 2nd level: target
     *
     * @return array
     */
    public function getAreaOfActivity(): array
    {
        $areaOfActivities = [];
        $extConf = GeneralUtility::makeInstance(ExtConf::class);

        /** @var Category $areaOfActivity */
        foreach ($this->areaOfActivity as $areaOfActivity) {
            $parentCategory = $areaOfActivity->getParent();
            if ($parentCategory->getUid() === $extConf->getRootCategory()) {
                $areaOfActivities[$areaOfActivity->getUid()] = $areaOfActivity;
                continue;
            }

            // Check, if looped category should be handled as target.
            // Update variables for better understanding
            $target = $areaOfActivity;
            $areaOfActivity = $persistedAreaOfActivity = $target->getParent();
            $parentCategory = $areaOfActivity->getParent();

            if ($parentCategory->getUid() === $extConf->getRootCategory()) {
                // Override $persistedAreaOfActivity, if exists
                if (array_key_exists($areaOfActivity->getUid(), $areaOfActivities)) {
                    $persistedAreaOfActivity = $areaOfActivities[$areaOfActivity->getUid()];
                }

                $persistedAreaOfActivity->addTarget($target);
                $areaOfActivities[$areaOfActivity->getUid()] = $persistedAreaOfActivity;
            }
        }
        return $areaOfActivities;
    }

    /**
     * Returns just the direct child categories of configured parent (ExtConf: rootCategory)
     * Used for areaOfActivity selectbox in frontend
     *
     * @return array
     */
    public function getAreaOfActivityFirstLevel(): array
    {
        $extConf = GeneralUtility::makeInstance(ExtConf::class);
        $areaOfActivities = [];

        /** @var Category $areaOfActivity */
        foreach ($this->areaOfActivity as $areaOfActivity) {
            if ($areaOfActivity->getParent()->getUid() === $extConf->getRootCategory()) {
                $areaOfActivities[] = $areaOfActivity;
            }
        }
        return $areaOfActivities;
    }

    public function setAreaOfActivity(\SplObjectStorage $areaOfActivity): void
    {
        $this->areaOfActivity = $areaOfActivity;
    }

    /**
     * Helper method to build a baseRecord for path_segment
     * Needed in PathSegmentHelper
     *
     * @return array
     */
    public function getBaseRecordForPathSegment(): array
    {
        return [
            'uid' => $this->getUid(),
            'pid' => $this->getPid(),
            'title' => $this->getTitle()
        ];
    }
}
