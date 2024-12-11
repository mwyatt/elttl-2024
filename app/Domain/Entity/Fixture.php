<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\Season;
use Illuminate\Support\Collection;

class Fixture
{
    /**
     * @param  Collection<int, Team>  $teams
     * @param  Collection<int, int>  $scores
     * @param  Collection<int, Encounter>  $encounters
     */
    public function __construct(
        private Season $season,
        private \DateTimeImmutable $fulfilledDate,
        private Collection $teams,
        private Collection $scores,
        private Collection $encounters,
    ) {}

    public function getSeason(): Season
    {
        return $this->season;
    }

    public function getFulfilledDate(): \DateTimeImmutable
    {
        return $this->fulfilledDate;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    /**
     * @return Collection<int, int>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    /**
     * @return Collection<int, Encounter>
     */
    public function getEncounters(): Collection
    {
        return $this->encounters;
    }
}
