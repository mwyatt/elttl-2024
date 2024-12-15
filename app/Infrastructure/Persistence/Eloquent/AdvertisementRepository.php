<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Common\Enum\ContentTypeEnum;
use App\Domain\Entity\Advertisement;
use App\Infrastructure\Persistence\Eloquent\Converters\ContentConverter;
use App\Models\ContentMetaModel;
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
    public function getViewGroup(string $viewGroup): Collection
    {
        return new Collection(
            ContentMetaModel::query()
                ->leftJoin('contents', 'content_metas.content_id', '=', 'contents.id')
                ->where('contents.type', ContentTypeEnum::ADVERTISEMENT)
                ->where('name', 'view_group')
                ->where('value', $viewGroup)
                ->get()
                ->each(fn($model) => $this->contentConverter->convertToAdvertisement($model->content()->get()->first()))
        );
    }
}
