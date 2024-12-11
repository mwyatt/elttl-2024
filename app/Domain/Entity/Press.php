<?php

namespace App\Domain\Entity;

use App\Common\Enum\ContentTypeEnum;

class Press
{
    public function __construct(
        private int             $id,
        private string          $title,
        private ContentTypeEnum $type,
        private ?string         $slug = null,
    )
    {
    }
}
