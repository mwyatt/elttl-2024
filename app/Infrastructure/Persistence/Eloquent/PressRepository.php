<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Common\Enum\ContentTypeEnum;
use App\Domain\Entity\Press;
use App\Infrastructure\Persistence\Eloquent\Converters\ContentConverter;
use App\Models\ContentModel;
use Illuminate\Support\Collection;

class PressRepository
{
    public function __construct(
        private ContentConverter $contentConverter
    )
    {
    }

    public function getOne(int $id): ContentModel
    {
        return new ContentModel();
        ContentModel::query()->findOrFail($id);
    }

    /**
     * @return Collection<int, Press>
     */
    public function getLatest(int $count = 5): Collection
    {
        return new Collection(
            ContentModel::query()
                ->where('type', ContentTypeEnum::PRESS)
                ->orderBy('created_at', 'desc')
                ->limit($count)
                ->get()
                ->each(fn($model) => $this->contentConverter->convertToPress($model))
        );
    }
}
