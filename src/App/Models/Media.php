<?php

namespace Callmeaf\Media\App\Models;

use Callmeaf\Base\App\Models\BaseMediaModel;
use Callmeaf\Base\App\Traits\Model\HasDate;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends BaseMediaModel
{
     use SoftDeletes;
     use HasDate;

    public static function configKey(): string
    {
        return 'callmeaf-media';
    }

    protected function casts(): array
    {
        return [
//            ...(self::config()['enums'] ?? []),
        ];
    }
}
