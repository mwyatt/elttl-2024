<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Entity\Location;
use App\Models\VenueModel;
use Illuminate\Support\Collection;

class TeamRepository extends TennisRepository
{
    public function __construct(
        private TeamConverter $converter
    )
    {
        parent::__construct();
    }

    /**
     * @return Collection<int, Location>
     */
    public function getAll(): Collection
    {
        return VenueModel::query()
            ->where('venues.season_id', $this->getSeasonId())
            ->orderBy('venues.created_at', 'desc')
            ->get()
            ->map(fn(VenueModel $model): Location => $this->converter->convert($model));
    }

    public function getById(int $id): Location
    {
        $model = VenueModel::query()
            ->where('venues.season_id', $this->getSeasonId())
            ->where('id', $id)
            ->firstOrFail();

        return $this->converter->convert($model);
    }

    public function update(
        int    $id,
        string $name,
        string $slug,
        string $location
    ): bool
    {
        $model = VenueModel::query()->findOrFail($id);

        $model->name = $name;
        $model->slug = $slug;
        $model->location = $location;

        return $model->save();
    }
}
