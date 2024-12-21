<?php

namespace App\Infrastructure\Persistence\Eloquent\Converters;

use App\Common\Enum\ContentTypeEnum;
use App\Domain\Entity\Advertisement;
use App\Domain\Entity\Page;
use App\Domain\Entity\Press;
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

    public function convertToPress(ContentModel $model): Press
    {
        return new Press(
            $model->id,
            $model->title,
            ContentTypeEnum::from($model->type),
            $model->created_at,
            $model->slug,
        );
    }

    public function convertToAdvertisement(ContentModel $model): Advertisement
    {
        return new Advertisement(
            $model->id,
            $model->title,
            $model->metas()->where('name', 'description')->first()->value,
            $model->metas()->where('name', 'url')->first()->value,
            $model->metas()->where('name', 'action')->first()->value,
            $model->slug,
        );
    }
}
