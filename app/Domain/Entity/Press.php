<?php

namespace App\Domain\Entity;

use App\Common\Enum\ContentTypeEnum;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;

class Press implements Arrayable
{
    public function __construct(
        private int             $id,
        private string          $title,
        private ContentTypeEnum $type,
        private Carbon          $createdAt,
        private ?string         $slug = null,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'slug' => $this->slug,
        ];
    }
}
