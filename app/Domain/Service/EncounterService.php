<?php

namespace App\Domain\Service;

use Exception;
use Illuminate\Support\Collection;

class EncounterService
{

    /**
     * @var array<int, array<int, int|string>
     */
    private array $scorecardStructure = [
        [1, 2],
        [3, 1],
        [2, 3],
        [3, 2],
        [1, 3],
        ['doubles', 'doubles'],
        [2, 1],
        [3, 3],
        [2, 2],
        [1, 1]
    ];

    /**
     * @var array<int, array<int, array<int, int>>>
     */
    private array $rankChangeMap = [
        24 => [[12, -8], [12, -8]],
        49 => [[11, -7], [14, -9]],
        99 => [[9, -6], [17, -11]],
        149 => [[8, -5], [21, -14]],
        199 => [[6, -4], [26, -17]],
        299 => [[5, -3], [33, -22]],
        399 => [[3, -2], [45, -30]],
        499 => [[2, -1], [60, -40]],
        99999 => [[0, -0], [75, -50]],
    ];

    public function getScorecardStructure(): array
    {
        return $this->scorecardStructure;
    }

    /**
     * @throws Exception
     */
    public function getRankChanges(
        $scoreLeft,
        $scoreRight,
        $rankLeft,
        $rankRight
    ): Collection
    {
        $rankDifference = abs($rankLeft - $rankRight);
        $winnerKey = $scoreLeft > $scoreRight ? 0 : 1;
        $favouriteKey = $rankLeft > $rankRight ? 0 : 1;
        $favouriteWon = $winnerKey === $favouriteKey;

        foreach ($this->rankChangeMap as $differenceThreshold => $modifierGroups) {
            if ($rankDifference <= $differenceThreshold) {
                return new Collection([
                    $modifierGroups[$favouriteWon ? 0 : 1][$winnerKey === 0 ? 0 : 1],
                    $modifierGroups[$favouriteWon ? 0 : 1][$winnerKey === 1 ? 0 : 1],
                ]);
            }
        }

        throw new Exception("No rank changes assigned");
    }
}
