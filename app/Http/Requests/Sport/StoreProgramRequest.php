<?php

namespace App\Http\Requests\Sport;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                     'max:100',
                     Rule::unique('user_program_weeks', 'name')->where(function ($query) {
                         $query->whereUserId(auth()->id());
                     }),
                     ],
            'exercise' => 'nullable|max:300',
        ];
    }
}
