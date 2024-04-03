<?php

use Callmeaf\Media\Enums\MediaCollection;
use Callmeaf\Media\Enums\MediaDisk;
use Callmeaf\Media\Enums\MediaStatus;
use Callmeaf\Media\Enums\MediaType;

return [
    MediaStatus::class => [
        MediaStatus::ACTIVE->name => 'Active',
        MediaStatus::INACTIVE->name => 'InActive',
    ],
    MediaType::class => [
        MediaType::PROFILE->name => 'Profile',
    ],
    MediaDisk::class => -[
        MediaDisk::UPLOADS->name => 'Uploads',
    ],
    MediaCollection::class => [
        MediaCollection::DEFAULT->name => 'Default'
    ],
];
