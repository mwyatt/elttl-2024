<?php

namespace App\Infrastructure\Persistence\Eloquent\Converters;

use App\Domain\Entity\Season;
use App\Models\Season as SeasonModel;

class SeasonConverter
{
    public function convert(SeasonModel $model): Season
    {
        return new Season(
            $model->id,
            $model->year,
        );
    }
}
