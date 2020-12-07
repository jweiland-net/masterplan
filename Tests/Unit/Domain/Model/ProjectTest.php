<?php

namespace JWeiland\Masterplan\Tests\Unit\Domain\Model;

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Masterplan\Domain\Model\Project;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case for class \JWeiland\Masterplan\Domain\Model\Project.
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
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        $this->assertSame('1', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getNumberInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function setNumberWithBooleanResultsInString()
    {
        $this->subject->setNumber(true);
        $this->assertSame('1', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function getContactPersonInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function setContactPersonWithBooleanResultsInString()
    {
        $this->subject->setContactPerson(true);
        $this->assertSame('1', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function getStartDateInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getStartDate());
    }

    /**
     * @test
     */
    public function setStartDateWithBooleanResultsInString()
    {
        $this->subject->setStartDate(true);
        $this->assertSame('1', $this->subject->getStartDate());
    }

    /**
     * @test
     */
    public function getEndDateInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getEndDate());
    }

    /**
     * @test
     */
    public function setEndDateWithBooleanResultsInString()
    {
        $this->subject->setEndDate(true);
        $this->assertSame('1', $this->subject->getEndDate());
    }

    /**
     * @test
     */
    public function getCostsInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getCosts());
    }

    /**
     * @test
     */
    public function setCostsWithBooleanResultsInString()
    {
        $this->subject->setCosts(true);
        $this->assertSame('1', $this->subject->getCosts());
    }

    /**
     * @test
     */
    public function getCitizenParticipationInitiallyReturnsFalse()
    {
        $this->assertFalse(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function setCitizenParticipationSetsCitizenParticipation()
    {
        $this->subject->setCitizenParticipation(true);
        $this->assertTrue(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function setCitizenParticipationWithStringReturnsTrue()
    {
        $this->subject->setCitizenParticipation('foo bar');
        $this->assertTrue(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function setCitizenParticipationWithZeroReturnsFalse()
    {
        $this->subject->setCitizenParticipation(0);
        $this->assertFalse(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
            $instance,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function setDescriptionWithBooleanResultsInString()
    {
        $this->subject->setDescription(true);
        $this->assertSame('1', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function getFurtherInformationsInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getFurtherInformations());
    }

    /**
     * @test
     */
    public function setFurtherInformationsWithBooleanResultsInString()
    {
        $this->subject->setFurtherInformations(true);
        $this->assertSame('1', $this->subject->getFurtherInformations());
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid()
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        $this->assertSame(
            $instance,
            $this->subject->getTxMaps2Uid()
        );
    }

    /**
     * @test
     */
    public function getFilesInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
            $instance,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function getLinksInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
            $instance,
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function getAreaOfActivityInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
            new \SplObjectStorage(),
            $this->subject->getAreaOfActivity()
        );
    }

    /**
     * @test
     */
    public function setAreaOfActivitySetsAreaOfActivity()
    {
        $instance = new \SplObjectStorage();
        $this->subject->setAreaOfActivity($instance);

        $this->assertSame(
            $instance,
            $this->subject->getAreaOfActivity()
        );
    }
}
