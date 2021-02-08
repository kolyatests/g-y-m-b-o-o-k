<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class  LoginRequest extends FormRequest
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
        if (app()->env === 'production') {
            return [
                'email' => 'required|email|max:255',
                'password' => 'required|string',
                'g-recaptcha-response' => 'required|captcha',
            ];
        } else {
            return [
                'email' => 'required|email|max:255',
                'password' => 'required|string',
                //'g-recaptcha-response' => 'required|captcha',
            ];
        }
    }
}
