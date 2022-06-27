<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Tests\Unit\Domain\Repository;

use JWeiland\Masterplan\Domain\Repository\CategoryRepository;
use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Test case.
 */
class CategoryRepositoryTest extends FunctionalTestCase
{
    use ProphecyTrait;

    /**
     * @var CategoryRepository
     */
    protected $subject;

    /**
     * @var PersistenceManager|ObjectProphecy
     */
    protected $persistenceManagerProphecy;

    /**
     * @var array
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/masterplan'
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $query = new Query('type');

        $this->persistenceManagerProphecy = $this->prophesize(PersistenceManager::class);
        $this->persistenceManagerProphecy
            ->createQueryForType(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn($query);

        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->subject = new CategoryRepository($objectManager);
        $this->subject->injectPersistenceManager($this->persistenceManagerProphecy->reveal());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset(
            $this->subject,
            $this->persistenceManagerProphecy
        );
    }

    /**
     * @test
     */
    public function categoriesAreSortedByTitleAsDefault(): void
    {
        $expectedResult = [
            'title' => QueryInterface::ORDER_ASCENDING
        ];
        self::assertSame(
            $expectedResult,
            $this->subject->createQuery()->getOrderings()
        );
    }
}
