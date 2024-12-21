<?php

namespace App\Domain\Entity;

use Illuminate\Contracts\Support\Arrayable;

class Location implements Arrayable
{
    public function __construct(
        private int     $id,
        private string  $name,
        private ?string $location,
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

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->location,
            'season' => $this->season?->toArray(),
            'slug' => $this->slug,
        ];
    }
}
