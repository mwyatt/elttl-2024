<?php

namespace App\Domain\Entity;

use Illuminate\Contracts\Support\Arrayable;

class Season implements Arrayable
{
    public function __construct(
        private int $id,
        private int $year,
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'year' => $this->year,
        ];
    }
}
