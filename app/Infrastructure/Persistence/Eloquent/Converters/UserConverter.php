<?php

namespace App\Infrastructure\Persistence\Eloquent\Converters;

use App\Domain\Entity\User;
use App\Models\User as UserModel;

class UserConverter
{
    public function convert(UserModel $model): User
    {
        return new User(
            $model->id,
            $model->name,
        );
    }
}
