<?php

namespace Callmeaf\Media\App\Http\Resources\Admin\V1;

use Callmeaf\Media\App\Models\Media;
use Callmeaf\User\App\Repo\Contracts\UserRepoInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Media $resource
 */
class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**
         * @var UserRepoInterface $userRepo
         */
        $userRepo = app(UserRepoInterface::class);
        return [
            'url' => $this->resource->getUrl(),
            'uuid' => $this->uuid,
            'collection_name' => $this->collection_name,
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'disk' => $this->disk,
            'size' => $this->size,
            'created_at' => $this->created_at,
            'created_at_text' => $this->createdAtText(),
            'updated_at' => $this->updated_at,
            'updated_at_text' => $this->updatedAtText(),
            'deleted_at' => $this->deleted_at,
            'deleted_at_text' => $this->deletedAtText(),
            'creator_identifier' => $this->creator_identifier,
            'creator' => $userRepo->toResource($this->whenLoaded('creator')),
        ];
    }
}
