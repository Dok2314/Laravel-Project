<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'message' => 'required|min:5|max:500',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Поле name должно быть заполнено!',
            'name.min' => 'Поле name должно содержать не менее 2 символов!',
            'name.max' => 'Поле Пост должно содержать не более 255 символов!',
            'email.required' => 'Поле email должно быть заполнено!',
            'email.min' => 'Поле email должно содержать не менее 4 символов!',
            'email.max' => 'Поле Пост должно содержать не более 255 символов!',
            'message.required' => 'Поле Пост должно быть заполнено!',
            'message.min' => 'Поле Пост должно содержать не менее 5 символов!',
            'message.max' => 'Поле Пост должно содержать не более 500 символов!',
        ];
    }
}
