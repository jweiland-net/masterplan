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
