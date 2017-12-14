<?php
namespace JWeiland\Masterplan\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use JWeiland\ServiceBw2\Domain\Repository\OrganisationseinheitenRepository;
use JWeiland\ServiceBw2\Utility\ModelUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Projects
 */
class Project extends AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * number
     *
     * @var string
     */
    protected $number = '';

    /**
     * contactPerson
     *
     * @var string
     */
    protected $contactPerson = '';

    /**
     * Organisationseinheiten
     * Initially a string but will be converted to an array with records when
     * calling getter the first time!
     *
     * @var string
     */
    protected $organisationseinheiten = '';

    /**
     * startDate
     *
     * @var string
     */
    protected $startDate = '';

    /**
     * endDate
     *
     * @var string
     */
    protected $endDate = '';

    /**
     * costs
     *
     * @var string
     */
    protected $costs = '';

    /**
     * citizenParticipation
     *
     * @var boolean
     */
    protected $citizenParticipation = false;

    /**
     * images
     *
     * @var \SplObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * furtherInformation
     *
     * @var string
     */
    protected $furtherInformations = '';

    /**
     * txMaps2Uid
     *
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * files
     *
     * @var \SplObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $files;

    /**
     * links
     *
     * @var \SplObjectStorage<\JWeiland\Masterplan\Domain\Model\Link>
     */
    protected $links ;

    /**
     * areaOfActivity
     *
     * @var \SplObjectStorage<\JWeiland\Masterplan\Domain\Model\Category>
     */
    protected $areaOfActivity;

    /**
     * Constructor of this class
     */
    public function __construct()
    {
        $this->images = new \SplObjectStorage();
        $this->files = new \SplObjectStorage();
        $this->links = new \SplObjectStorage();
        $this->areaOfActivity = new \SplObjectStorage();
    }

    /**
     * Returns Title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets Title
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns Number
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Sets Number
     *
     * @param string $number
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    /**
     * Returns ContactPerson
     *
     * @return string
     */
    public function getContactPerson(): string
    {
        return $this->contactPerson;
    }

    /**
     * Sets ContactPerson
     *
     * @param string $contactPerson
     */
    public function setContactPerson(string $contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }

    /**
     * Returns Organisationseinheiten
     *
     * @return array
     */
    public function getOrganisationseinheiten(): array
    {
        return $this->organisationseinheiten = ModelUtility::getOrganisationseinheiten($this->organisationseinheiten);
    }

    /**
     * Sets Organisationseinheiten
     *
     * @param array $organisationseinheiten
     */
    public function setOrganisationseinheiten(array $organisationseinheiten)
    {
        $this->organisationseinheiten = $organisationseinheiten;
    }

    /**
     * Returns StartDate
     *
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * Sets StartDate
     *
     * @param string $startDate
     */
    public function setStartDate(string $startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Returns EndDate
     *
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * Sets EndDate
     *
     * @param string $endDate
     */
    public function setEndDate(string $endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * Returns Costs
     *
     * @return string
     */
    public function getCosts(): string
    {
        return $this->costs;
    }

    /**
     * Sets Costs
     *
     * @param string $costs
     */
    public function setCosts(string $costs)
    {
        $this->costs = $costs;
    }

    /**
     * Returns CitizenParticipation
     *
     * @return bool
     */
    public function isCitizenParticipation(): bool
    {
        return $this->citizenParticipation;
    }

    /**
     * Sets CitizenParticipation
     *
     * @param bool $citizenParticipation
     */
    public function setCitizenParticipation(bool $citizenParticipation)
    {
        $this->citizenParticipation = $citizenParticipation;
    }

    /**
     * Returns Images
     *
     * @return \SplObjectStorage
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets Images
     *
     * @param \SplObjectStorage $images
     */
    public function setImages(\SplObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Returns Description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets Description
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns FurtherInformations
     *
     * @return string
     */
    public function getFurtherInformations(): string
    {
        return $this->furtherInformations;
    }

    /**
     * Sets FurtherInformations
     *
     * @param string $furtherInformations
     */
    public function setFurtherInformations(string $furtherInformations)
    {
        $this->furtherInformations = $furtherInformations;
    }

    /**
     * Returns TxMaps2Uid
     *
     * @return \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    public function getTxMaps2Uid()
    {
        return $this->txMaps2Uid;
    }

    /**
     * Sets TxMaps2Uid
     *
     * @param \JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid
     */
    public function setTxMaps2Uid(\JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid)
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    /**
     * Returns Files
     *
     * @return \SplObjectStorage
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Sets Files
     *
     * @param \SplObjectStorage $files
     */
    public function setFiles(\SplObjectStorage $files)
    {
        $this->files = $files;
    }

    /**
     * Returns Links
     *
     * @return \SplObjectStorage
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Sets Links
     *
     * @param \SplObjectStorage $links
     */
    public function setLinks(\SplObjectStorage $links)
    {
        $this->links = $links;
    }

    /**
     * Returns AreaOfActivity
     *
     * @return \SplObjectStorage
     */
    public function getAreaOfActivity()
    {
        return $this->areaOfActivity;
    }

    /**
     * Sets AreaOfActivity
     *
     * @param \SplObjectStorage $areaOfActivity
     */
    public function setAreaOfActivity(\SplObjectStorage $areaOfActivity)
    {
        $this->areaOfActivity = $areaOfActivity;
    }
}
