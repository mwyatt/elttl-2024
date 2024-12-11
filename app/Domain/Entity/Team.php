<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\Season;
use Illuminate\Support\Collection;

class Team
{
    /**
     * @param Collection<int, Player> $players
     */
    public function __construct(
        private Division   $division,
        private string     $name,
        private int        $homeWeekday,
        private Player     $secretary,
        private Location   $venue,
        private Collection $players,
        private ?Season    $season = null,
        private ?string    $slug = null,
    )
    {
    }

    public function getDivision(): Division
    {
        return $this->division;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHomeWeekday(): int
    {
        return $this->homeWeekday;
    }

    public function getSecretary(): Player
    {
        return $this->secretary;
    }

    public function getVenue(): Location
    {
        return $this->venue;
    }

    /**
     * @return Collection<int, Player> $players
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }
}
