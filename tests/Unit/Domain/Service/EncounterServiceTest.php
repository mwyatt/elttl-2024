<?php

namespace Tests\Unit\Domain\Service;

use App\Domain\Service\EncounterService;
use PHPUnit\Framework\TestCase;

class EncounterServiceTest extends TestCase
{
    public function testGetRankChanges(): void
    {
        $encounterService = new EncounterService();

        // Underdog wins
        $rankChanges = $encounterService->getRankChanges(1, 3, 5400, 5200);
        $this->assertCount(2, $rankChanges);
        $this->assertEquals(-22, $rankChanges[0]);
        $this->assertEquals(33, $rankChanges[1]);

        // Expected winner
        $rankChanges = $encounterService->getRankChanges(3, 2, 600, 200);
        $this->assertCount(2, $rankChanges);
        $this->assertEquals(2, $rankChanges[0]);
        $this->assertEquals(-1, $rankChanges[1]);

        // Equal ranks
        $rankChanges = $encounterService->getRankChanges(3, 1, 100, 100);
        $this->assertCount(2, $rankChanges);
        $this->assertEquals(12, $rankChanges[0]);
        $this->assertEquals(-8, $rankChanges[1]);
    }
}
