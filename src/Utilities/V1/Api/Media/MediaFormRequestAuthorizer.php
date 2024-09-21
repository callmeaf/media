<?php

namespace Callmeaf\Media\Utilities\V1\Api\Media;

use Callmeaf\Base\Utilities\V1\FormRequestAuthorizer;

class MediaFormRequestAuthorizer extends FormRequestAuthorizer
{
    public function destroy(): bool
    {
        $media = $this->request->route('media');
        return strval($media->model_id) === strval($this->request->user()->id);
    }
}
