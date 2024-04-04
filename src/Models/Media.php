<?php

namespace Callmeaf\Media\Models;

use Callmeaf\Base\Contracts\HasEnum;
use Callmeaf\Base\Traits\HasDate;
use Callmeaf\Base\Traits\HasStatus;
use Callmeaf\Base\Traits\HasType;
use Callmeaf\Media\Enums\MediaStatus;
use Callmeaf\Media\Enums\MediaType;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;
class Media extends SpatieMedia implements HasEnum
{
    use SoftDeletes,HasDate,HasType,HasStatus;

    protected $casts = [
        'type' => MediaType::class,
        'status' => MediaStatus::class,
        'manipulations' => 'array',
        'custom_properties' => 'array',
        'generated_conversions' => 'array',
        'responsive_images' => 'array',
    ];
    public static function enumsLang(): array
    {
        return __('callmeaf-media::enums');
    }
}
