<?php

namespace Tests\Unit\Domain\Entity;

use App\Domain\Entity\Division;
use App\Domain\Entity\Encounter;
use App\Domain\Entity\Fixture;
use App\Domain\Entity\Location;
use App\Domain\Entity\Player;
use App\Domain\Entity\Team;
use App\Domain\ValueObject\Season;
use App\Infrastructure\Persistence\Eloquent\FixtureRepositoryInterface;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class FixtureTest extends TestCase
{
    public function testEntitiyConstruction(): void
    {
        $fixtureRepository = $this->createMock(FixtureRepositoryInterface::class);
        $season = new Season(2024);
        $player = new Player($season, 'Martin', new Collection(), 2003, 321, new Collection);
        $team = new Team(
            new Division($season, 'A'),
            'KSB A',
            1,
            $player,
            new Location('KSB', '13 Park Pl, Chorlton-cum-Hardy, Manchester M21 8AU'),
            new Collection([$player, $player]),
        );

        $fixtureRepository->expects($this->once())
            ->method('getOne')
            ->with($this->equalTo(1))
            ->willReturn(new Fixture(
                $season,
                new \DateTimeImmutable('2024-01-01'),
                new Collection([$team, $team]),
                new Collection([22, 24]),
                new Collection([new Encounter(new Collection([$player, $player]), new Collection([3, 1]), new Collection([10, -5]))]),
            ));

        $fixture = $fixtureRepository->getOne(1);

        $this->assertInstanceOf(Fixture::class, $fixture);
    }
}
