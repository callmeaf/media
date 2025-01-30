<?php

namespace Callmeaf\Media\Utilities\V1\Api\Media;

use Callmeaf\Base\Utilities\V1\FormRequestAuthorizer;
use Callmeaf\Permission\Enums\PermissionName;

class MediaFormRequestAuthorizer extends FormRequestAuthorizer
{
    public function destroy(): bool
    {
        $authUser = authUser(request: $this->request);
        if($authUser->isSuperAdminOrAdmin()) {
            return userCan(PermissionName::MEDIA_DESTROY);
        }
        $media = $this->request->route('media');
        return userCan(PermissionName::MEDIA_DESTROY) && strval($media->model_id) === strval($authUser->id);
    }
}
