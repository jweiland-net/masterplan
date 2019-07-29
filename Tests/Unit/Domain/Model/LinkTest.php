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
use JWeiland\Masterplan\Domain\Model\Link;

/**
 * Test case for class \JWeiland\Masterplan\Domain\Model\Category.
 *
 * @subpackage masterplan
 */
class LinkTest extends UnitTestCase {

	/**
	 * @var \JWeiland\Masterplan\Domain\Model\Link
	 */
	protected $subject;

	/**
	 * set up class
	 */
	public function setUp() {
		$this->subject = new Link();
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
	public function getLinkInitiallyReturnsEmptyString() {
		$this->assertSame(
			'',
			$this->subject->getLink()
		);
	}

	/**
	 * @test
	 */
	public function setLinkSetsLink() {
		$this->subject->setLink('foo bar');

		$this->assertSame(
			'foo bar',
			$this->subject->getLink()
		);
	}

	/**
	 * @test
	 */
	public function setLinkWithIntegerResultsInString() {
		$this->subject->setLink(123);
		$this->assertSame('123', $this->subject->getLink());
	}

	/**
	 * @test
	 */
	public function setLinkWithBooleanResultsInString() {
		$this->subject->setLink(TRUE);
		$this->assertSame('1', $this->subject->getLink());
	}

	/**
	 * @test
	 */
	public function getTitleInitiallyReturnsEmptyString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleSetsTitle() {
		$this->subject->setTitle('foo bar');

		$this->assertSame(
			'foo bar',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleWithIntegerResultsInString() {
		$this->subject->setTitle(123);
		$this->assertSame('123', $this->subject->getTitle());
	}

	/**
	 * @test
	 */
	public function setTitleWithBooleanResultsInString() {
		$this->subject->setTitle(TRUE);
		$this->assertSame('1', $this->subject->getTitle());
	}
}
