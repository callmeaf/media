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

class Media extends BaseMediaModel
{
     use SoftDeletes;
     use HasDate;

     protected static function booted()
     {
         static::creating(function(Model $model) {
             if($user = Auth::user()) {
                 $model->forceFill([
                     'creator_identifier' => $user->getRouteKey(),
                 ]);
             }
         });

         static::deleted(function (Model $model) {
             /**
              * @var HasMedia $mediable
              */
             $mediable = $model->model;
             if($model->trashed() && !$mediable->keepDeletedMedia()) {
                 $model->forceDelete();
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

        return $user->getRouteKey() === $this->creator_identifier;
    }
}
