<?php

namespace Database\Seeders;

use App\Common\Enum\ContentTypeEnum;
use App\Models\ContentModel;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContentModel::factory()->createMany([
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
            ['type' => ContentTypeEnum::PAGE],
        ])->map(fn(ContentModel $content) => $content->metas()->createMany([
            ['name' => 'description', 'value' => 'This is a description'],
            ['name' => 'keywords', 'value' => 'This, is, a, keyword'],
        ]));

        ContentModel::factory()->createMany([
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
            ['type' => ContentTypeEnum::PRESS],
        ])->map(fn(ContentModel $content) => $content->metas()->createMany([
            ['name' => 'description', 'value' => 'This is a description'],
            ['name' => 'keywords', 'value' => 'This, is, a, keyword'],
        ]));

        ContentModel::factory()->createMany([
            ['type' => ContentTypeEnum::ADVERTISEMENT],
            ['type' => ContentTypeEnum::ADVERTISEMENT],
            ['type' => ContentTypeEnum::ADVERTISEMENT],
        ])->map(function (ContentModel $content) {
            $contentMetas = [
                ['name' => 'view_group', 'value' => 'home-primary'],
                ['name' => 'action', 'value' => 'View'],
            ];

            $content->metas()->createMany($contentMetas);
        });
    }
}
