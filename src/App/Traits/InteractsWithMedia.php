<?php

namespace Callmeaf\Media\App\Traits;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Events\CollectionHasBeenClearedEvent;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait InteractsWithMedia
{
    use \Spatie\MediaLibrary\InteractsWithMedia;

    public function forceClearMediaCollection(string $collectionName = 'default'): HasMedia
    {
        $this
            ->getMedia($collectionName)
            ->each(fn (Media $media) => $media->forceDelete());

        event(new CollectionHasBeenClearedEvent($this, $collectionName));

        if ($this->mediaIsPreloaded()) {
            unset($this->media);
        }

        return $this;
    }

    public function keepDeletedMedia(): bool
    {
        return true;
    }
}
