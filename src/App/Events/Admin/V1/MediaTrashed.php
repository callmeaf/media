<?php

namespace Callmeaf\Media\App\Events\Admin\V1;

use Callmeaf\Media\App\Models\Media;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MediaTrashed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param Collection<Media> $media
     * Create a new event instance.
     */
    public function __construct(Collection $media)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
