<?php

namespace App\Http\Requests\Sport;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return
            ['program' => 'integer|min:1999|exists:user_program_weeks,program_week_id'];
    }
}
