<?php

declare(strict_types=1);

namespace App\Common\Enum;

enum EncounterStatusEnum: int
{
    case DOUBLES = 1;
    case EXCLUDE = 2;
}
