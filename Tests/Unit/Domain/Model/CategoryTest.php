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
use TYPO3\CMS\Core\Tests\UnitTestCase;
use JWeiland\Masterplan\Domain\Model\Category;

/**
 * Test case for class \JWeiland\Masterplan\Domain\Model\Category.
 *
 * @subpackage masterplan
 */
class CategoryTest extends UnitTestCase {

	/**
	 * @var \JWeiland\Masterplan\Domain\Model\Category
	 */
	protected $subject;

	/**
	 * set up class
	 */
	public function setUp() {
		$this->subject = new Category();
	}

	/**
	 * tear down class
	 */
	public function tearDown() {
		unset($this->subject);
	}

	/**
	 * @return array
	 */
	public function propertiesForCategoryObjectDataProvider() {
		$properties = [];
		$properties['property title exists in category object'] = ['title', 'getTitle', 'setTitle'];
		$properties['property description exists in category object'] = ['description', 'getDescription', 'setDescription'];
		$properties['property icon exists in category object'] = ['icon', 'getIcon', 'setIcon'];
		$properties['property parent exists in category object'] = ['parent', 'getParent', 'setParent'];
		return $properties;
	}

	/**
	 * There already exists a test in extbase extension
	 * Here we only test if everything is available
	 *
	 * @test
	 * @dataProvider propertiesForCategoryObjectDataProvider
	 */
	public function propertiesAndItsGetterAndSetterAreDefinedInCategoryModel($property, $getter, $setter) {
		$this->assertSame(
			TRUE,
			property_exists($this->subject, $property)
		);
		$this->assertSame(
			TRUE,
			method_exists($this->subject, $getter)
		);
		$this->assertSame(
			TRUE,
			method_exists($this->subject, $setter)
		);
	}

}
