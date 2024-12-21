<?php

namespace App\Infrastructure\Persistence\Eloquent\Converters;

use App\Domain\Entity\Team;
use App\Models\TeamModel;

class TeamConverter
{
    public function __construct(private SeasonConverter $seasonConverter)
    {
    }


    public function convert(TeamModel $model): Team
    {
//        return new Team(
//
//            $model->id,
//            $model->name,
//            $model->location,
//            $this->seasonConverter->convert($model->season),
//            $model->slug,
//        );
    }
}
