<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Infrastructure\Persistence\Eloquent\Converters\ContentConverter;
use App\Models\ContentModel;

class PageRepository extends ContentRepository
{
    public function getOne(int $id): ContentModel
    {
        return (new ContentConverter())->convertToPage(
            ContentModel::query()->findOrFail($id)
        );
    }
}
