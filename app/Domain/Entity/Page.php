<?php

namespace App\Domain\Entity;

use App\Common\Enum\ContentTypeEnum;

class Page
{
    public function __construct(
        private int             $id,
        private string          $title,
        private string          $html,
        private ContentTypeEnum $type,
        private User            $user,
        private ?string         $slug = null,
    )
    {
    }
}
