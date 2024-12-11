<?php

namespace App\Domain\Entity;

use App\Common\Enum\ContentTypeEnum;

class Advertisement
{
    public function __construct(
        private int             $id,
        private string          $title,
        private string          $description,
        private string          $action,
        private ContentTypeEnum $type,
        private ?string         $slug = null,
    )
    {
    }
}
