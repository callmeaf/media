<?php

namespace Callmeaf\Media\Http\Requests\V1\Api;

use Illuminate\Foundation\Http\FormRequest;

class MediaDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $media = $this->route('media');
        return strval($media->model_id) === strval($this->user()->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return collect([
            //
        ])->map(
            fn($values,$key) => validationManager($key,$values,config("callmeaf-media.validations.media_destroy")))
            ->toArray();
    }

}
