<?php

use Callmeaf\Media\App\Enums\MediaStatus;
use Callmeaf\Media\App\Enums\MediaType;

return [
    MediaStatus::class => [
        MediaStatus::ACTIVE->name => 'Active',
        MediaStatus::INACTIVE->name => 'InActive',
        MediaStatus::PENDING->name => 'Pending',
    ],
    MediaType::class => [
        //
    ],
];
