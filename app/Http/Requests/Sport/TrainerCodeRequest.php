<?php

namespace App\Http\Requests\Sport;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrainerCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'trainer_code' => [
                'required',
                'integer',
                Rule::exists('users', 'trainer_code'),
            ],
        ];
    }
}
