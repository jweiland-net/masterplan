<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Tests\Functional\Domain\Model;

use JWeiland\Masterplan\Configuration\ExtConf;
use JWeiland\Masterplan\Domain\Model\Category;
use JWeiland\Masterplan\Domain\Model\Project;
use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case.
 */
class ProjectTest extends FunctionalTestCase
{
    /**
     * @var Project
     */
    protected $subject;

    /**
     * @var array
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/masterplan'
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Project();
    }

    protected function tearDown(): void
    {
        unset(
            $this->subject
        );

        parent::tearDown();
    }

    /**
     * @test
     */
    public function getAreaOfActivityInitiallyReturnsEmptyArray(): void
    {
        self::assertSame(
            [],
            $this->subject->getAreaOfActivity()
        );
    }

    /**
     * @test
     */
    public function setAreaOfActivitySetsAreaOfActivity(): void
    {
        $extConf = GeneralUtility::makeInstance(ExtConf::class);
        $extConf->setRootCategory(1);

        $rootCategory = new Category();
        $rootCategory->initializeObject();
        $rootCategory->_setProperty('uid', 1);
        $rootCategory->setTitle('Root');

        $areaOfActivity1 = new Category();
        $areaOfActivity1->initializeObject();
        $areaOfActivity1->_setProperty('uid', 2);
        $areaOfActivity1->setTitle('jweiland.net');
        $areaOfActivity1->setParent($rootCategory);

        $areaOfActivity2 = new Category();
        $areaOfActivity2->initializeObject();
        $areaOfActivity2->_setProperty('uid', 3);
        $areaOfActivity2->setTitle('Cars');
        $areaOfActivity2->setParent($rootCategory);

        $target = new Category();
        $target->initializeObject();
        $target->_setProperty('uid', 4);
        $target->setTitle('Target');

        $areaOfActivity2->addTarget($target);

        $objectStorage = new ObjectStorage();
        $objectStorage->attach($areaOfActivity1);
        $objectStorage->attach($areaOfActivity2);

        $this->subject->setAreaOfActivity($objectStorage);

        self::assertEquals(
            [
                2 => $areaOfActivity1,
                3 => $areaOfActivity2
            ],
            $this->subject->getAreaOfActivity()
        );
    }
}
