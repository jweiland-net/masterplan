<?php
namespace JWeiland\Masterplan\Tests\Unit\Domain\Model;

/*
 * This file is part of the masterplan project..
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
