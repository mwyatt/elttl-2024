<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\Season;

class Division
{
    public function __construct(
        private Season $season,
        private string $name,
    ) {}

    public function getSeason(): Season
    {
        return $this->season;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
