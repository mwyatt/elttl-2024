<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\Detail;
use App\Domain\ValueObject\Season;
use Illuminate\Support\Collection;

class Player
{
    /**
     * @param  Collection<int, Detail>  $details
     * @param  Collection<int, Team>  $teams
     */
    public function __construct(
        private Season $season,
        private string $nameFirst,
        private Collection $details,
        private int $rank,
        private int $licenseNumber,
        private Collection $teams,
        private ?string $nameLast = null,
        private ?string $slug = null,
    ) {}

    public function getSeason(): Season
    {
        return $this->season;
    }

    public function getNameFirst(): string
    {
        return $this->nameFirst;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function getLicenseNumber(): int
    {
        return $this->licenseNumber;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function getNameLast(): ?string
    {
        return $this->nameLast;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }
}
