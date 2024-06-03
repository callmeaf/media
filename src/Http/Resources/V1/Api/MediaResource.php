<?php

namespace Callmeaf\Media\Http\Resources\V1\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public function __construct($resource,protected array|int $only = [])
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return toArrayResource([
            'id' => fn() => $this->id,
            'status' => fn() => $this->status,
            'status_text' => fn() => $this->statusText,
            'type' => fn() => $this->type,
            'type_text' => fn() => $this->typeText,
            'url' => fn() => $this->getUrl(),
            'size' => fn() => $this->size,
            'collection_name' => fn() => $this->collection_name,
            'file_name' => fn() => $this->file_name,
            'name' => fn() => $this->name,
            'disk' => fn() => $this->disk,
            'created_at' => fn() => $this->created_at,
            'created_at_text' => fn() => $this->createdAtText,
        ],$this->only);
    }
}
