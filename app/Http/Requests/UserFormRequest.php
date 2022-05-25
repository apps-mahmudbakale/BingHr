<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        $data = [
            'employee_id' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|confirmed'
        ];

        if (request()->isMethod('PATCH')) {
            $data['email'] = 'required|email';
            $data['password'] = '';
        }

        return $data;
    }
}
