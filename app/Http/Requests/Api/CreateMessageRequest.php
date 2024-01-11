<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'message' => [
                'required',
                'string'
            ],
            'group_id' => [
                'required',
                Rule::exists('groups', 'id'),
            ],
            'user_id' => [
                'required',
                Rule::exists('users', 'id'),
            ],
        ];
    }
}
