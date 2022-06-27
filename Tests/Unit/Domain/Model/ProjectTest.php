<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Tests\Unit\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Masterplan\Domain\Model\Project;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case.
 */
class ProjectTest extends UnitTestCase
{
    /**
     * @var Project
     */
    protected $subject;

    protected function setUp(): void
    {
        $this->subject = new Project();
    }

    protected function tearDown(): void
    {
        unset(
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle(): void
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
    public function getNumberInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberSetsNumber(): void
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
    public function getContactPersonInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function setContactPersonSetsContactPerson(): void
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
    public function getStartDateInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getStartDate()
        );
    }

    /**
     * @test
     */
    public function setStartDateSetsStartDate(): void
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
    public function getEndDateInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getEndDate()
        );
    }

    /**
     * @test
     */
    public function setEndDateSetsEndDate(): void
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
    public function getCostsInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCosts()
        );
    }

    /**
     * @test
     */
    public function setCostsSetsCosts(): void
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
    public function getCitizenParticipationInitiallyReturnsFalse(): void
    {
        self::assertFalse(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function setCitizenParticipationSetsCitizenParticipation(): void
    {
        $this->subject->setCitizenParticipation(true);
        self::assertTrue(
            $this->subject->isCitizenParticipation()
        );
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesSetsImages(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setImages($instance);

        self::assertSame(
            $instance,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionSetsDescription(): void
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
    public function getFurtherInformationsInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFurtherInformations()
        );
    }

    /**
     * @test
     */
    public function setFurtherInformationsSetsFurtherInformations(): void
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
    public function getTxMaps2UidInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid(): void
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
    public function getFilesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesSetsFiles(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setFiles($instance);

        self::assertSame(
            $instance,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function getLinksInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function setLinksSetsLinks(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setLinks($instance);

        self::assertSame(
            $instance,
            $this->subject->getLinks()
        );
    }
}
