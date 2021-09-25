<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:4|max:255',
            'password' => 'required|min:2|max:255',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Поле name должно быть заполнено!',
            'name.min' => 'Поле name должно содержать не менее 2 символов!',
            'name.max' => 'Поле name должно содержать не более 255 символов!',
            'email.required' => 'Поле email должно быть заполнено!',
            'email.min' => 'Поле email должно содержать не менее 4 символов!',
            'email.max' => 'Поле email должно содержать не более 255 символов!',
            'password.required' => 'Поле password должно быть заполнено!',
            'password.min' => 'Поле password должно содержать не менее 2 символов!',
            'password.max' => 'Поле password должно содержать не более 255 символов!',
        ];
    }
}
