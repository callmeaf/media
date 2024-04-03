<?php

use Callmeaf\Media\Enums\MediaCollection;
use Callmeaf\Media\Enums\MediaDisk;
use Callmeaf\Media\Enums\MediaStatus;
use Callmeaf\Media\Enums\MediaType;

return [
    MediaStatus::class => [
        MediaStatus::ACTIVE->name => 'فعال',
        MediaStatus::INACTIVE->name => 'غیرفعال',
    ],
    MediaType::class => [
        MediaType::PROFILE->name => 'پروفایل',
    ],
    MediaDisk::class => -[
        MediaDisk::UPLOADS->name => 'آپلود',
    ],
    MediaCollection::class => [
        MediaCollection::DEFAULT->name => 'پیش فرض'
    ],
];
