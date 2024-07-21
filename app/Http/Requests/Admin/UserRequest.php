<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Api\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            "name"=>'required|string',
            'user_name'=>'required|string|unique:users,user_name,'.request()->route('User'),
            'email'=>'required|email|unique:users,email,'.request()->route('User'),
            'phone'=>'required|min_digits:3|unique:users,phone,'.request()->route('User'),
            'password'=> (request()->isMethod('put'))? 'nullable|string|min:6' : 'required|string|min:6',

        ];
    }
}
