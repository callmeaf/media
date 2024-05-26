<?php

return [
    'model' => \Callmeaf\Media\Models\Media::class,
    'model_resource' => \Callmeaf\Media\Http\Resources\V1\Api\MediaResource::class,
    'model_resource_collection' => \Callmeaf\Media\Http\Resources\V1\Api\MediaCollection::class,
    'service' => \Callmeaf\Media\Services\V1\MediaService::class,
    'default_values' => [
        'status' => \Callmeaf\Media\Enums\MediaStatus::ACTIVE,
        'type' => \Callmeaf\Media\Enums\MediaType::DEFAULT,
    ],
    'events' => [
        \Callmeaf\Media\Events\MediaDeleted::class => [
            //
        ],
    ],
    'validations' => [
        'media' => \Callmeaf\Media\Utilities\V1\Media\Api\MediaFormRequestValidator::class,
    ],
    'resources' => [

    ],
    'controllers' => [
        'media' => \Callmeaf\Media\Http\Controllers\V1\Api\MediaController::class,
    ],
    'form_request_authorizers' => [
        'media' => \Callmeaf\Media\Utilities\V1\Media\Api\MediaFormRequestAuthorizer::class,
    ],
    'middlewares' => [
        'media' => \Callmeaf\Media\Utilities\V1\Media\Api\MediaControllerMiddleware::class,
    ],
];
