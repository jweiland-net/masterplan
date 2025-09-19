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
use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case.
 */
class ProjectTest extends UnitTestCase
{
    protected Project $subject;

    protected function setUp(): void
    {
        $this->subject = new Project();
    }

    protected function tearDown(): void
    {
        unset(
            $this->subject,
        );
    }

    #[Test]
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle(),
        );
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle(),
        );
    }

    #[Test]
    public function getNumberInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNumber(),
        );
    }

    #[Test]
    public function setNumberSetsNumber(): void
    {
        $this->subject->setNumber('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getNumber(),
        );
    }

    #[Test]
    public function getContactPersonInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContactPerson(),
        );
    }

    #[Test]
    public function setContactPersonSetsContactPerson(): void
    {
        $this->subject->setContactPerson('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getContactPerson(),
        );
    }

    #[Test]
    public function getStartDateInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getStartDate(),
        );
    }

    #[Test]
    public function setStartDateSetsStartDate(): void
    {
        $this->subject->setStartDate('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getStartDate(),
        );
    }

    #[Test]
    public function getEndDateInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getEndDate(),
        );
    }

    #[Test]
    public function setEndDateSetsEndDate(): void
    {
        $this->subject->setEndDate('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEndDate(),
        );
    }

    #[Test]
    public function getCostsInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCosts(),
        );
    }

    #[Test]
    public function setCostsSetsCosts(): void
    {
        $this->subject->setCosts('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getCosts(),
        );
    }

    #[Test]
    public function getCitizenParticipationInitiallyReturnsFalse(): void
    {
        self::assertFalse(
            $this->subject->isCitizenParticipation(),
        );
    }

    #[Test]
    public function setCitizenParticipationSetsCitizenParticipation(): void
    {
        $this->subject->setCitizenParticipation(true);
        self::assertTrue(
            $this->subject->isCitizenParticipation(),
        );
    }

    #[Test]
    public function getImagesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages(),
        );
    }

    #[Test]
    public function setImagesSetsImages(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setImages($instance);

        self::assertSame(
            $instance,
            $this->subject->getImages(),
        );
    }

    #[Test]
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription(),
        );
    }

    #[Test]
    public function setDescriptionSetsDescription(): void
    {
        $this->subject->setDescription('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getDescription(),
        );
    }

    #[Test]
    public function getFurtherInformationsInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFurtherInformations(),
        );
    }

    #[Test]
    public function setFurtherInformationsSetsFurtherInformations(): void
    {
        $this->subject->setFurtherInformations('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getFurtherInformations(),
        );
    }

    #[Test]
    public function getTxMaps2UidInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    #[Test]
    public function setTxMaps2UidSetsTxMaps2Uid(): void
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        self::assertSame(
            $instance,
            $this->subject->getTxMaps2Uid(),
        );
    }

    #[Test]
    public function getFilesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getFiles(),
        );
    }

    #[Test]
    public function setFilesSetsFiles(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setFiles($instance);

        self::assertSame(
            $instance,
            $this->subject->getFiles(),
        );
    }

    #[Test]
    public function getLinksInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getLinks(),
        );
    }

    #[Test]
    public function setLinksSetsLinks(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setLinks($instance);

        self::assertSame(
            $instance,
            $this->subject->getLinks(),
        );
    }
}
