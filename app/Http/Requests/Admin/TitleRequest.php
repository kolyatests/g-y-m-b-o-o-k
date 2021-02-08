<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class  TitleRequest extends FormRequest
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
            'title.eng' => 'required|max:50',
            'title.rus' => 'required|max:50',
            'title.deu' => 'required|max:50',
            'title.spa' => 'required|max:50',
            'title.por' => 'required|max:50'
        ];
    }
}
