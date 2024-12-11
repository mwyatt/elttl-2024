<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Models\Content;

class ContentRepository
{
    public function getOne(int $id): Content
    {
        return new Content();
        Content::query()->findOrFail($id);
    }
}
