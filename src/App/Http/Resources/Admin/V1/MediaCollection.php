<?php

namespace Callmeaf\Media\App\Http\Resources\Admin\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @extends ResourceCollection<MediaResource>
 */
class MediaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, MediaResource>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
