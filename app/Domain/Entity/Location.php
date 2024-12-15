<?php

namespace App\Domain\Entity;

class Location
{
    public function __construct(
        private string  $name,
        private string  $location, // lookup address? gmaps position?
        private ?Season $season = null,
        private ?string $slug = null,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): string
    {
        return $this->location;
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
