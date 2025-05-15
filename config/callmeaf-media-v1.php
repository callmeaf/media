<?php

use Callmeaf\Base\App\Enums\RequestType;

return [
    'model' => \Callmeaf\Media\App\Models\Media::class,
    'route_key_name' => 'uuid',
    'repo' => \Callmeaf\Media\App\Repo\V1\MediaRepo::class,
    'resources' => [
        RequestType::API->value => [
            'resource' => \Callmeaf\Media\App\Http\Resources\Api\V1\MediaResource::class,
            'resource_collection' => \Callmeaf\Media\App\Http\Resources\Api\V1\MediaCollection::class,
        ],
        RequestType::WEB->value => [
            'resource' => \Callmeaf\Media\App\Http\Resources\Web\V1\MediaResource::class,
            'resource_collection' => \Callmeaf\Media\App\Http\Resources\Web\V1\MediaCollection::class,
        ],
        RequestType::ADMIN->value => [
            'resource' => \Callmeaf\Media\App\Http\Resources\Admin\V1\MediaResource::class,
            'resource_collection' => \Callmeaf\Media\App\Http\Resources\Admin\V1\MediaCollection::class,
        ],
    ],
    'events' => [
        RequestType::API->value => [
            \Callmeaf\Media\App\Events\Api\V1\MediaIndexed::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Api\V1\MediaCreated::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Api\V1\MediaShowed::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Api\V1\MediaUpdated::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Api\V1\MediaDeleted::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Api\V1\MediaStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Api\V1\MediaTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::WEB->value => [
            \Callmeaf\Media\App\Events\Web\V1\MediaIndexed::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Web\V1\MediaCreated::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Web\V1\MediaShowed::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Web\V1\MediaUpdated::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Web\V1\MediaDeleted::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Web\V1\MediaStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Web\V1\MediaTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::ADMIN->value => [
            \Callmeaf\Media\App\Events\Admin\V1\MediaIndexed::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Admin\V1\MediaCreated::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Admin\V1\MediaShowed::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Admin\V1\MediaUpdated::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Admin\V1\MediaDeleted::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Admin\V1\MediaStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Media\App\Events\Admin\V1\MediaTypeUpdated::class => [
                // listeners
            ],
        ],
    ],
    'requests' => [
        RequestType::API->value => [
            'index' => \Callmeaf\Media\App\Http\Requests\Api\V1\MediaIndexRequest::class,
            'store' => \Callmeaf\Media\App\Http\Requests\Api\V1\MediaStoreRequest::class,
            'show' => \Callmeaf\Media\App\Http\Requests\Api\V1\MediaShowRequest::class,
            'update' => \Callmeaf\Media\App\Http\Requests\Api\V1\MediaUpdateRequest::class,
            'destroy' => \Callmeaf\Media\App\Http\Requests\Api\V1\MediaDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Media\App\Http\Requests\Api\V1\MediaStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Media\App\Http\Requests\Api\V1\MediaTypeUpdateRequest::class,
        ],
        RequestType::WEB->value => [
            'index' => \Callmeaf\Media\App\Http\Requests\Web\V1\MediaIndexRequest::class,
            'create' => \Callmeaf\Media\App\Http\Requests\Web\V1\MediaCreateRequest::class,
            'store' => \Callmeaf\Media\App\Http\Requests\Web\V1\MediaStoreRequest::class,
            'show' => \Callmeaf\Media\App\Http\Requests\Web\V1\MediaShowRequest::class,
            'edit' => \Callmeaf\Media\App\Http\Requests\Web\V1\MediaEditRequest::class,
            'update' => \Callmeaf\Media\App\Http\Requests\Web\V1\MediaUpdateRequest::class,
            'destroy' => \Callmeaf\Media\App\Http\Requests\Web\V1\MediaDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Media\App\Http\Requests\Web\V1\MediaStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Media\App\Http\Requests\Web\V1\MediaTypeUpdateRequest::class,
        ],
        RequestType::ADMIN->value => [
            'index' => \Callmeaf\Media\App\Http\Requests\Admin\V1\MediaIndexRequest::class,
            'store' => \Callmeaf\Media\App\Http\Requests\Admin\V1\MediaStoreRequest::class,
            'show' => \Callmeaf\Media\App\Http\Requests\Admin\V1\MediaShowRequest::class,
            'update' => \Callmeaf\Media\App\Http\Requests\Admin\V1\MediaUpdateRequest::class,
            'destroy' => \Callmeaf\Media\App\Http\Requests\Admin\V1\MediaDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Media\App\Http\Requests\Admin\V1\MediaStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Media\App\Http\Requests\Admin\V1\MediaTypeUpdateRequest::class,
        ],
    ],
    'controllers' => [
        RequestType::API->value => [
            'medium' => \Callmeaf\Media\App\Http\Controllers\Api\V1\MediaController::class,
        ],
        RequestType::WEB->value => [
            'medium' => \Callmeaf\Media\App\Http\Controllers\Web\V1\MediaController::class,
        ],
        RequestType::ADMIN->value => [
            'medium' => \Callmeaf\Media\App\Http\Controllers\Admin\V1\MediaController::class,
        ],
    ],
    'routes' => [
        RequestType::API->value => [
            'prefix' => 'media',
            'as' => 'media.',
            'middleware' => [
                "auth:sanctum"
            ],
        ],
        RequestType::WEB->value => [
            'prefix' => 'media',
            'as' => 'media.',
            'middleware' => [
                "route_status:" . \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND
            ],
        ],
        RequestType::ADMIN->value => [
            'prefix' => 'media',
            'as' => 'media.',
            'middleware' => [
                "auth:sanctum",
                "role:" . \Callmeaf\Role\App\Enums\RoleName::SUPER_ADMIN->value,
            ],
        ],
    ],
    'enums' => [
         'status' => \Callmeaf\Media\App\Enums\MediaStatus::class,
         'type' => \Callmeaf\Media\App\Enums\MediaType::class,
    ],
     'exports' => [
        RequestType::API->value => [
            'excel' => \Callmeaf\Media\App\Exports\Api\V1\MediaExport::class,
        ],
        RequestType::WEB->value => [
            'excel' => \Callmeaf\Media\App\Exports\Web\V1\MediaExport::class,
        ],
        RequestType::ADMIN->value => [
            'excel' => \Callmeaf\Media\App\Exports\Admin\V1\MediaExport::class,
        ],
     ],
     'imports' => [
         RequestType::API->value => [
             'excel' => \Callmeaf\Media\App\Imports\Api\V1\MediaImport::class,
         ],
         RequestType::WEB->value => [
             'excel' => \Callmeaf\Media\App\Imports\Web\V1\MediaImport::class,
         ],
         RequestType::ADMIN->value => [
             'excel' => \Callmeaf\Media\App\Imports\Admin\V1\MediaImport::class,
         ],
     ],
];
