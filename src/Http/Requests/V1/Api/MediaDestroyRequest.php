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
        return app(config('callmeaf-media.form_request_authorizers.media'))->destroy();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return validationManager(rules: [

        ],filters: app(config("callmeaf-media.validations.media"))->destroy());
    }

}
