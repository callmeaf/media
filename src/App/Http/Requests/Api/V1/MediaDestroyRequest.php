<?php

namespace Callmeaf\Media\App\Http\Requests\Api\V1;

use Callmeaf\Media\App\Repo\Contracts\MediaRepoInterface;
use Illuminate\Foundation\Http\FormRequest;

class MediaDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /**
         * @var MediaRepoInterface $mediaRepo
         */
        $mediaRepo = app(MediaRepoInterface::class);

        $media = $mediaRepo->findById($this->route('medium'));
        return $media->resource->canBeDelete(user: $this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
