<?php

namespace App\Domain\Service;

use App\Common\Tennis;
use App\Domain\Entity\Encounter;
use App\Domain\Entity\Fixture;
use App\Domain\Entity\Player;
use Illuminate\Support\Collection;

class FixtureService
{
    private int $encounterCount = 10;

    public function __construct(
        private EncounterService $encounterService
    )
    {
    }


    /**
     * @param Collection<int, Player> $players
     */
    public function buildEncounters(
        Fixture    $fixture,
        Collection $players,
        array      $encounterStruct,
        array      $playerStruct
    )
    {
        foreach ($this->encounterService->getScorecardStructure() as $rowKey => $scorecardStructureRow) {
            $encounter = new Encounter();
            $encounterScoreRow = $encounterStruct[$rowKey];
            if (!isset($encounterScoreRow['left']) || !isset($encounterScoreRow['right'])) {
                throw new \Exception('Encounter scores input misconfigured.');
            }
            $encounter->yearId = $fixture->yearId;
            $encounter->fixtureId = $fixture->id;
            $encounter->scoreLeft = $encounterScoreRow['left'];
            $encounter->scoreRight = $encounterScoreRow['right'];
            $encounter->status = isset($encounterScoreRow['status']) ? $encounterScoreRow['status'] : '';
            if ($encounter->status != 'doubles') {
                $encounter->playerIdLeft = $playerStruct['left'][reset($scorecardStructureRow)];
                $encounter->playerIdRight = $playerStruct['right'][end($scorecardStructureRow)];
                $encounter->playerLeft = $players->getById($encounter->playerIdLeft);
                $encounter->playerRight = $players->getById($encounter->playerIdRight);
                if ($encounter->playerLeft && $encounter->playerRight) {
                    $this->encounterService->setRankChange(
                        $encounter,
                        $encounter->playerLeft->rank,
                        $encounter->playerRight->rank
                    );
                    $encounter->playerLeft->modifyRank($encounter->playerRankChangeLeft);
                    $encounter->playerRight->modifyRank($encounter->playerRankChangeRight);
                }
            }
            $encounters->append($encounter);
        }
        $fixture->timeFulfilled = time();
        $fixture->encounters = $encounters;
    }


    public function reset(\Mwyatt\Elttl\Model\Fixture $fixture)
    {
        if (!$fixture->timeFulfilled) {
            throw new \Exception('Fixture has not been fulfilled yet.');
        }
        $fixture->timeFulfilled = null;
        foreach ($fixture->encounters as $encounter) {
            foreach (Tennis::getSides() as $side) {
                $sideUc = ucfirst($side);
                $player = $encounter->{"player$sideUc"};
                $rankChange = $encounter->{"playerRankChange$sideUc"};
                if ($player && $rankChange !== 0) {
                    $player->modifyRank($rankChange, true);
                }
            }
        }
    }
}
