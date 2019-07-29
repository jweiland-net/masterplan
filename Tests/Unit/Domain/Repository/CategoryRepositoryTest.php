<?php
namespace JWeiland\Masterplan\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Stefan Froemken <projects@jweiland.net>, jweiland.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Test case for class \JWeiland\Masterplan\Domain\Repository\CategoryRepository.
 *
 * @subpackage masterplan
 */
class CategoryRepositoryTest extends UnitTestCase {

	/**
	 * @var \JWeiland\Masterplan\Domain\Repository\CategoryRepository
	 */
	protected $subject;

	/**
	 * set up class
	 */
	public function setUp() {
		$objectManager = new ObjectManager();
		$this->subject = $objectManager->get('JWeiland\\Masterplan\\Domain\\Repository\\CategoryRepository');
	}

	/**
	 * tear down class
	 */
	public function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function categoriesAreSortedByTitleAsDefault() {
		$expectedResult = [
			'title' => QueryInterface::ORDER_ASCENDING
        ];
		$this->assertSame(
			$expectedResult,
			$this->subject->createQuery()->getOrderings()
		);
	}

}
