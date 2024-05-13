<?php

namespace Callmeaf\Media\Http\Controllers\V1\Api;

use Callmeaf\Base\Http\Controllers\V1\Api\ApiController;
use Callmeaf\Media\Http\Requests\V1\Api\MediaDestroyRequest;
use Callmeaf\Media\Models\Media;
use Callmeaf\Media\Services\V1\MediaService;

class MediaController extends ApiController
{
    protected MediaService $mediaService;

    public function __construct()
    {
        app(config('callmeaf-media.middlewares.media'))($this);
        $this->mediaService = app(config('callmeaf-media.service'));
    }


    public function destroy(MediaDestroyRequest $request,Media $media)
    {
        try {
             $media = $this->mediaService->setModel($media)->delete()->getModel(asResource: true,attributes: [
                 'id',
                 'url',
                 'deleted_at'
             ]);
             return apiResponse([
                 'media' => $media,
             ],__('callmeaf-base::v1.successful_deleted_non_title'));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }
}
