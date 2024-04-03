<?php

return [
    'model' => \Callmeaf\Media\Models\Media::class,
    'model_resource' => \Callmeaf\Media\Http\Resources\V1\Api\MediaResource::class,
    'model_resource_collection' => \Callmeaf\Media\Http\Resources\V1\Api\MediaCollection::class,
    'service' => \Callmeaf\Media\Services\V1\MediaService::class,
    'service_interface' => \Callmeaf\Media\Services\V1\MediaServiceInterface::class,
    'default_values' => [
        'status' => \Callmeaf\Media\Enums\MediaStatus::ACTIVE,
        'type' => \Callmeaf\Media\Enums\MediaType::DEFAULT,
    ],
    'validations' => [
    ],
    'resources' => [

    ],
    'controllers' => [

    ],
    'middlewares' => [
        'global' => [],
    ],
];
