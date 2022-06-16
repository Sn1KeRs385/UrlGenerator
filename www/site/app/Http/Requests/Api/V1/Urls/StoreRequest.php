<?php

namespace App\Http\Requests\Api\V1\Urls;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'origin_url' => 'required|url',
            'expired_at' => 'sometimes|nullable|int',
        ];
    }
}
