<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\Tests\Functional\Domain\Model;

use JWeiland\Masterplan\Domain\Model\Project;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * Test case.
 */
class ProjectTest extends FunctionalTestCase
{
    protected Project $subject;

    protected array $testExtensionsToLoad = [
        'jweiland/masterplan',
        'jweiland/maps2',
        'jweiland/service-bw2',
    ];

    protected array $coreExtensionsToLoad = [
        'typo3/cms-scheduler',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Project();
    }

    protected function tearDown(): void
    {
        unset(
            $this->subject,
        );

        parent::tearDown();
    }

    #[Test]
    public function getAreaOfActivityInitiallyReturnsEmptyArray(): void
    {
        self::assertSame(
            [],
            $this->subject->getAreaOfActivity(),
        );
    }
}
