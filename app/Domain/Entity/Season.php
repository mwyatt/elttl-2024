<?php

namespace App\Domain\Entity;

class Season
{
    public function __construct(
        private int     $id,
        private int     $year,
        private ?string $staticLegacyBackup = null,
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

    public function getStaticLegacyBackup(): ?string
    {
        return $this->staticLegacyBackup;
    }
}
