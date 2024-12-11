<?php

namespace App\Domain\ValueObject;

class Season
{
    public function __construct(
        private int $year,
        private ?string $staticLegacyBackup = null,
    ) {}

    public function getYear(): int
    {
        return $this->year;
    }

    public function getStaticLegacyBackup(): ?string
    {
        return $this->staticLegacyBackup;
    }
}
