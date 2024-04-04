<?php

namespace Callmeaf\Media\Services\V1;

use Callmeaf\Base\Services\V1\BaseService;
use Callmeaf\Media\Services\V1\Contracts\MediaServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MediaService extends BaseService implements MediaServiceInterface
{
    public function __construct(?Builder $query = null, ?Model $model = null, ?Collection $collection = null, ?string $resource = null, ?string $resourceCollection = null, array $defaultData = [])
    {
        parent::__construct($query, $model, $collection, $resource, $resourceCollection, $defaultData);
        $this->query = app(config('callmeaf-media.model'))->query();
        $this->resource = config('callmeaf-media.model_resource');
        $this->resourceCollection = config('callmeaf-media.model_resource_collection');
        $this->defaultData = config('callmeaf-media.default_values');
    }


}
