<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Common\Enum\ContentTypeEnum;
use App\Domain\Entity\Advertisement;
use App\Infrastructure\Persistence\Eloquent\Converters\ContentConverter;
use App\Models\ContentModel;
use Illuminate\Support\Collection;

class AdvertisementRepository
{
    public function __construct(
        private ContentConverter $contentConverter
    )
    {
    }

    /**
     * @return Collection<int, Advertisement>
     */
    public function getViewGroup(string $viewGroup, int $limit = 3): Collection
    {
        return ContentModel::query()
            ->leftJoin('content_metas', 'content_metas.content_id', '=', 'contents.id')
            ->where('contents.type', ContentTypeEnum::ADVERTISEMENT)
            ->where('name', 'view_group')
            ->where('value', $viewGroup)
            ->orderBy('contents.created_at', 'desc')
            ->limit($limit)
            ->get()
            ->map(fn(ContentModel $model): Advertisement => $this->contentConverter->convertToAdvertisement($model));
    }
}
