<?php

namespace Callmeaf\Media\App\Enums;


use Callmeaf\Base\App\Enums\BaseStatus;

enum MediaStatus: string
{
    case ACTIVE = BaseStatus::ACTIVE->value;
    case INACTIVE = BaseStatus::INACTIVE->value;
    case PENDING = BaseStatus::PENDING->value;
}
