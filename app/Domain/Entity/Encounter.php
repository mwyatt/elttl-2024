<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\Season;
use Illuminate\Support\Collection;

class Encounter
{
    /**
     * @param Collection<int, Player> $players
     * @param Collection<int, int> $scores
     * @param Collection<int, int> $rankChanges
     */
    public function __construct(
        private Collection $players,
        private Collection $scores,
        private Collection $rankChanges,
        private ?int       $status = null,
        private ?Season    $season = null,
        private ?Fixture   $fixture = null,
    )
    {
    }

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    /**
     * @return Collection<int, int>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    /**
     * @return Collection<int, int>
     */
    public function getRankChanges(): Collection
    {
        return $this->rankChanges;
    }

    public function setRankChanges(Collection $rankChanges): void
    {
        $this->rankChanges = $rankChanges;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }
}
