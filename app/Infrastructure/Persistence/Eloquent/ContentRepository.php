<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Models\ContentModel;

class ContentRepository
{
    public function getOne(int $id): ContentModel
    {
        return new ContentModel();
        ContentModel::query()->findOrFail($id);
    }
}
