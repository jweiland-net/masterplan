<?php

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Tests\Functional\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Masterplan\Domain\Model\Project;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case.
 */
class ProjectTest extends UnitTestCase
{
    /**
     * @var Project
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Project();
    }

    public function tearDown()
    {
        unset(
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleWithIntegerResultsInString()
    {
        $this->subject->setTitle(123);
        self::assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        self::assertSame('1', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getNumberInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberSetsNumber()
    {
        $this->subject->setNumber('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberWithIntegerResultsInString()
    {
        $this->subject->setNumber(123);
        self::assertSame('123', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function setNumberWithBooleanResultsInString()
    {
        $this->subject->setNumber(true);
        self::assertSame('1', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function getContactPersonInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function setContactPersonSetsContactPerson()
    {
        $this->subject->setContactPerson('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function setContactPersonWithIntegerResultsInString()
    {
        $this->subject->setContactPerson(123);
        self::assertSame('123', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function setContactPersonWithBooleanResultsInString()
    {
        $this->subject->setContactPerson(true);
        self::assertSame('1', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function getStartDateInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getStartDate()
        );
    }

    /**
     * @test
     */
    public function setStartDateSetsStartDate()
    {
        $this->subject->setStartDate('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getStartDate()
        );
    }

    /**
     * @test
     */
    public function setStartDateWithIntegerResultsInString()
    {
        $this->subject->setStartDate(123);
        self::assertSame('123', $this->subject->getStartDate());
    }

    /**
     * @test
     */
    public function setStartDateWithBooleanResultsInString()
    {
        $this->subject->setStartDate(true);
        self::assertSame('1', $this->subject->getStartDate());
    }

    /**
     * @test
     */
    public function getEndDateInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getEndDate()
        );
    }

    /**
     * @test
     */
    public function setEndDateSetsEndDate()
    {
        $this->subject->setEndDate('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEndDate()
        );
    }

    /**
     * @test
     */
    public function setEndDateWithIntegerResultsInString()
    {
        $this->subject->setEndDate(123);
        self::assertSame('123', $this->subject->getEndDate());
    }

    /**
     * @test
     */
    public function setEndDateWithBooleanResultsInString()
    {
        $this->subject->setEndDate(true);
        self::assertSame('1', $this->subject->getEndDate());
    }

    /**
     * @test
     */
    public function getCostsInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getCosts()
        );
    }

    /**
     * @test
     */
    public function setCostsSetsCosts()
    {
        $this->subject->setCosts('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getCosts()
        );
    }

    /**
     * @test
     */
    public function setCostsWithIntegerResultsInString()
    {
        $this->subject->setCosts(123);
        self::assertSame('123', $this->subject->getCosts());
    }

    /**
     * @test
     */
    public function setCostsWithBooleanResultsInString()
    {
        $this->subject->setCosts(true);
        self::assertSame('1', $this->subject->getCosts());
    }

    /**
     * @test
     */
    public function getCitizenParticipationInitiallyReturnsFalse()
    {
        self::assertFalse(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function setCitizenParticipationSetsCitizenParticipation()
    {
        $this->subject->setCitizenParticipation(true);
        self::assertTrue(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function setCitizenParticipationWithStringReturnsTrue()
    {
        $this->subject->setCitizenParticipation('foo bar');
        self::assertTrue(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function setCitizenParticipationWithZeroReturnsFalse()
    {
        $this->subject->setCitizenParticipation(0);
        self::assertFalse(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new \SplObjectStorage(),
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesSetsImages()
    {
        $instance = new \SplObjectStorage();
        $this->subject->setImages($instance);

        self::assertSame(
            $instance,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionSetsDescription()
    {
        $this->subject->setDescription('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionWithIntegerResultsInString()
    {
        $this->subject->setDescription(123);
        self::assertSame('123', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function setDescriptionWithBooleanResultsInString()
    {
        $this->subject->setDescription(true);
        self::assertSame('1', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function getFurtherInformationsInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getFurtherInformations()
        );
    }

    /**
     * @test
     */
    public function setFurtherInformationsSetsFurtherInformations()
    {
        $this->subject->setFurtherInformations('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getFurtherInformations()
        );
    }

    /**
     * @test
     */
    public function setFurtherInformationsWithIntegerResultsInString()
    {
        $this->subject->setFurtherInformations(123);
        self::assertSame('123', $this->subject->getFurtherInformations());
    }

    /**
     * @test
     */
    public function setFurtherInformationsWithBooleanResultsInString()
    {
        $this->subject->setFurtherInformations(true);
        self::assertSame('1', $this->subject->getFurtherInformations());
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid()
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        self::assertSame(
            $instance,
            $this->subject->getTxMaps2Uid()
        );
    }

    /**
     * @test
     */
    public function getFilesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new \SplObjectStorage(),
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesSetsFiles()
    {
        $instance = new \SplObjectStorage();
        $this->subject->setFiles($instance);

        self::assertSame(
            $instance,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function getLinksInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new \SplObjectStorage(),
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function setLinksSetsLinks()
    {
        $instance = new \SplObjectStorage();
        $this->subject->setLinks($instance);

        self::assertSame(
            $instance,
            $this->subject->getLinks()
        );
    }
}
