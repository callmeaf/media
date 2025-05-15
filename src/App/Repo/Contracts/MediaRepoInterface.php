<?php

namespace Callmeaf\Media\App\Repo\Contracts;

use Callmeaf\Base\App\Repo\Contracts\BaseRepoInterface;
use Callmeaf\Media\App\Models\Media;
use Callmeaf\Media\App\Http\Resources\Api\V1\MediaCollection;
use Callmeaf\Media\App\Http\Resources\Api\V1\MediaResource;

/**
 * @extends BaseRepoInterface<Media,MediaResource,MediaCollection>
 */
interface MediaRepoInterface extends BaseRepoInterface
{

}
