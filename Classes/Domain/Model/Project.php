<?php
namespace JWeiland\Masterplan\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Stefan Froemken <projects@jweiland.net>, www.jweiland.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Projects
 */
class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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

	/*
	 * tradeOffice
	 * @todo replace tx_wesgovernment with service_bw (do not forget getter/setter!)
	 * @var \Tx_WesEgovernment_Domain_Model_Department
	 */
	//protected $tradeOffice = NULL;

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
	protected $citizenParticipation = FALSE;

	/**
	 * images
	 *
	 * @var \SplObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $images = NULL;

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
	protected $txMaps2Uid = NULL;

	/**
	 * files
	 *
	 * @var \SplObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $files = NULL;

	/**
	 * links
	 *
	 * @var \SplObjectStorage<\JWeiland\Masterplan\Domain\Model\Link>
	 */
	protected $links = NULL;

	/**
	 * areaOfActivity
	 *
	 * @var \SplObjectStorage<\JWeiland\Masterplan\Domain\Model\Category>
	 */
	protected $areaOfActivity = NULL;

	/**
	 * Constructor of this class
	 */
	public function __construct() {
		$this->images = new \SplObjectStorage();
		$this->files = new \SplObjectStorage();
		$this->links = new \SplObjectStorage();
		$this->areaOfActivity = new \SplObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = (string) $title;
	}

	/**
	 * Returns the number
	 *
	 * @return string $number
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * Sets the number
	 *
	 * @param string $number
	 * @return void
	 */
	public function setNumber($number) {
		$this->number = (string) $number;
	}

	/**
	 * Returns the contactPerson
	 *
	 * @return string $contactPerson
	 */
	public function getContactPerson() {
		return $this->contactPerson;
	}

	/**
	 * Sets the contactPerson
	 *
	 * @param string $contactPerson
	 * @return void
	 */
	public function setContactPerson($contactPerson) {
		$this->contactPerson = (string) $contactPerson;
	}

//	/**
//	 * Returns the tradeOffice
//	 *
//	 * @return \Tx_WesEgovernment_Domain_Model_Department $tradeOffice
//	 */
//	public function getTradeOffice() {
//		return $this->tradeOffice;
//	}
//
//	/**
//	 * Sets the tradeOffice
//	 *
//	 * @param \Tx_WesEgovernment_Domain_Model_Department $tradeOffice
//	 * @return void
//	 */
//	public function setTradeOffice(\Tx_WesEgovernment_Domain_Model_Department $tradeOffice = NULL) {
//		$this->tradeOffice = $tradeOffice;
//	}

	/**
	 * Returns the startDate
	 *
	 * @return string $startDate
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	/**
	 * Sets the startDate
	 *
	 * @param string $startDate
	 * @return void
	 */
	public function setStartDate($startDate) {
		$this->startDate = (string) $startDate;
	}

	/**
	 * Returns the endDate
	 *
	 * @return string $endDate
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	/**
	 * Sets the endDate
	 *
	 * @param string $endDate
	 * @return void
	 */
	public function setEndDate($endDate) {
		$this->endDate = (string) $endDate;
	}

	/**
	 * Returns the costs
	 *
	 * @return string $costs
	 */
	public function getCosts() {
		return $this->costs;
	}

	/**
	 * Sets the costs
	 *
	 * @param string $costs
	 * @return void
	 */
	public function setCosts($costs) {
		$this->costs = (string) $costs;
	}

	/**
	 * Returns the citizenParticipation
	 *
	 * @return boolean $citizenParticipation
	 */
	public function getCitizenParticipation() {
		return $this->citizenParticipation;
	}

	/**
	 * Sets the citizenParticipation
	 *
	 * @param boolean $citizenParticipation
	 * @return void
	 */
	public function setCitizenParticipation($citizenParticipation) {
		$this->citizenParticipation = (bool) $citizenParticipation;
	}

	/**
	 * Returns the boolean state of citizenParticipation
	 *
	 * @return boolean
	 */
	public function isCitizenParticipation() {
		return $this->citizenParticipation;
	}

	/**
	 * Returns the images
	 *
	 * @return \SplObjectStorage $images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Sets the images
	 *
	 * @param \SplObjectStorage $images
	 * @return void
	 */
	public function setImages(\SplObjectStorage $images) {
		$this->images = $images;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = (string) $description;
	}

	/**
	 * Returns the furtherInformations
	 *
	 * @return string $furtherInformations
	 */
	public function getFurtherInformations() {
		return $this->furtherInformations;
	}

	/**
	 * Sets the furtherInformations
	 *
	 * @param string $furtherInformations
	 * @return void
	 */
	public function setFurtherInformations($furtherInformations) {
		$this->furtherInformations = (string) $furtherInformations;
	}

	/**
	 * Returns the txMaps2Uid
	 *
	 * @return \JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid
	 */
	public function getTxMaps2Uid() {
		return $this->txMaps2Uid;
	}

	/**
	 * Sets the txMaps2Uid
	 *
	 * @param \JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid
	 * @return void
	 */
	public function setTxMaps2Uid(\JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid = NULL) {
		$this->txMaps2Uid = $txMaps2Uid;
	}

	/**
	 * Returns the files
	 *
	 * @return \SplObjectStorage $files
	 */
	public function getFiles() {
		return $this->files;
	}

	/**
	 * Sets the files
	 *
	 * @param \SplObjectStorage $files
	 * @return void
	 */
	public function setFiles(\SplObjectStorage $files) {
		$this->files = $files;
	}

	/**
	 * Returns the links
	 *
	 * @return \SplObjectStorage $links
	 */
	public function getLinks() {
		return $this->links;
	}

	/**
	 * Sets the links
	 *
	 * @param \SplObjectStorage $links
	 * @return void
	 */
	public function setLinks(\SplObjectStorage $links) {
		$this->links = $links;
	}

	/**
	 * Returns the areaOfActivity
	 *
	 * @return \SplObjectStorage $areaOfActivity
	 */
	public function getAreaOfActivity() {
		return $this->areaOfActivity;
	}

	/**
	 * Sets the areaOfActivity
	 *
	 * @param \SplObjectStorage $areaOfActivity
	 * @return void
	 */
	public function setAreaOfActivity(\SplObjectStorage $areaOfActivity) {
		$this->areaOfActivity = $areaOfActivity;
	}

}