<?php

namespace Callmeaf\Media\App\Models;

use App\Models\User;
use Callmeaf\Base\App\Models\BaseMediaModel;
use Callmeaf\Base\App\Traits\Model\HasDate;
use Callmeaf\Media\App\Models\Contracts\HasMedia;
use Callmeaf\User\App\Repo\Contracts\UserRepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Media extends BaseMediaModel
{
     use SoftDeletes;
     use HasDate;

     protected static function booted()
     {
         static::creating(function(Model $model) {
             if($user = Auth::user()) {
                 $model->forceFill([
                     'creator_identifier' => $user->identifier(),
                 ]);
             }
         });

         static::deleted(function (Model $model) {
             /**
              * @var Media $model
              */
             /**
              * @var HasMedia $mediable
              */
             $mediable = $model->model;
             if($model->trashed() && !$mediable->keepDeletedMedia()) {
                 $model->forceDelete();
                 Storage::disk($model->disk)->delete($model->getPath());
             }
         });
     }

    public static function configKey(): string
    {
        return 'callmeaf-media';
    }

    protected function casts(): array
    {
        return [
//            ...(self::config()['enums'] ?? []),
        ];
    }

    public function creator(): BelongsTo
    {
        /**
         * @var UserRepoInterface $userRepo
         */
        $userRepo = app(UserRepoInterface::class);

        return $this->belongsTo($userRepo->getModel()::class,'creator_identifier',$userRepo->getModel()->getRouteKeyName());
    }

    /**
     * @param ?User $user
     * @return bool
     */
    public function canBeDelete($user = null): bool
    {
        $user ??= Auth::user();

        return $user->identifier() === $this->creator_identifier;
    }
}
