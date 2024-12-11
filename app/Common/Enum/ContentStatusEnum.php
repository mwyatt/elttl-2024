<?php

declare(strict_types=1);

namespace App\Common\Enum;

enum ContentStatusEnum: int
{
    case DRAFT = 1;
    case PUBLISHED = 2;
}
