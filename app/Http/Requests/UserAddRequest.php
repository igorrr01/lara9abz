<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:3|max:15',
            'last_name' => 'required|min:3|max:15',
            'city' => 'required|min:4|max:15',
            'birthday' => 'required|date',
            'email' => 'required|unique:users|min:4|max:35',
            'password' => 'required|min:6|max:256',
        ];
    }

}
