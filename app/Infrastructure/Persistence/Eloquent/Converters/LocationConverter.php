<?php

namespace App\Infrastructure\Persistence\Eloquent\Converters;

use App\Domain\Entity\Location;
use App\Models\VenueModel;

class LocationConverter
{
    public function __construct(private SeasonConverter $seasonConverter)
    {
    }


    public function convert(VenueModel $model): Location
    {
        return new Location(
            $model->id,
            $model->name,
            $model->location,
            $this->seasonConverter->convert($model->season),
            $model->slug,
        );
    }
}
