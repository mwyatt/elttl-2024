<?php

namespace App\Infrastructure\Persistence\Eloquent\Converters;

use App\Domain\Entity\Page;
use App\Models\UserModel;

class UserConverter
{
    public function convert(UserModel $model): Page
    {
        return new User(
            $model->id,
            $model->name,
        );
    }
}
