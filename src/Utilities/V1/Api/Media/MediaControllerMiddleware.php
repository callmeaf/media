<?php

namespace Callmeaf\Media\Utilities\V1\Api\Media;

use Callmeaf\Base\Http\Controllers\BaseController;
use Callmeaf\Base\Utilities\V1\ControllerMiddleware;

class MediaControllerMiddleware extends ControllerMiddleware
{
    public function __invoke(BaseController $controller): void
    {
        $controller->middleware('auth:sanctum')->only([
            'destroy'
        ]);
    }
}
