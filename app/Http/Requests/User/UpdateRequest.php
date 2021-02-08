<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class   UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'avatar' => 'nullable|image',
            'first_name' => 'nullable|alpha|max:50',
            'last_name' => 'nullable|alpha|max:50',
            'location' => 'nullable|max:20',
            'gender' => 'nullable|string',
        ];
    }
}
