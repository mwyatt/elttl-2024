<?php

namespace App\Infrastructure\Persistence\Eloquent\Converters;

use App\Common\Enum\ContentTypeEnum;
use App\Domain\Entity\Page;
use App\Models\ContentModel;

class ContentConverter
{
    public function convertToPage(ContentModel $model): Page
    {
        return new Page(
            $model->id,
            $model->title,
            $model->html,
            ContentTypeEnum::from($model->type),
            (new UserConverter())->convert($model->user),
        );
    }
}
