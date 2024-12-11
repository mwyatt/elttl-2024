<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Entity\Fixture;

interface FixtureRepositoryInterface
{
    public function getOne(int $id): Fixture;
}
