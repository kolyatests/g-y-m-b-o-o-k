<?php

namespace App\Http\Requests\Sport;

use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'day' => [
                'required',
                'integer',
                'min:1',
                Rule::exists('user_programs', 'user_program_id')->where(function ($query) {
                    $query->whereUserId(auth()->id());
                }),
            ],
            'program' => [
                'required',
                'integer',
                'min:1999',
                Rule::exists('user_program_weeks', 'program_week_id')->where(function ($query) {
                    $query->whereUserId(auth()->id());
                }),
            ],
            'exercise' => 'max:300'

        ];
    }
}
