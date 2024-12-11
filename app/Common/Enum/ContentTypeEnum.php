<?php

declare(strict_types=1);

namespace App\Common\Enum;

enum ContentTypeEnum: int
{
    case PAGE = 1;
    case PRESS = 2;
    case ADVERTISEMENT = 3;
}
