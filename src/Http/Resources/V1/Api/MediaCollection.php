<?php

namespace Callmeaf\Media\Http\Resources\V1\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

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
        return parent::toArray($request);
    }
}
