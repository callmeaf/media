<?php

namespace Callmeaf\Media\Http\Resources\V1\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Log;

class MediaCollection extends ResourceCollection
{
    public function __construct($resource,protected array|int $only = [])
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(fn($media) => toArrayResource(data: [
                'id' => fn() => $media->id,
                'status' => fn() => $media->status,
                'status_text' => fn() => $media->statusText,
                'type' => fn() => $media->type,
                'type_text' => fn() => $media->typeText,
                'url' => fn() => $media->getUrl(),
                'size' => fn() => $media->size,
                'collection_name' => fn() => $media->collection_name,
                'file_name' => fn() => $media->file_name,
                'name' => fn() => $media->name,
                'disk' => fn() => $media->disk,
                'created_at' => fn() => $media->created_at,
                'created_at_text' => fn() => $media->createdAtText,
            ],only: $this->only)),
        ];
    }
}




