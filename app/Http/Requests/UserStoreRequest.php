<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:50',
            'phone' => 'required|max:18',
            'refer_number' => 'required | integer',
            'password' => 'required | between:6,255| confirmed',
            'address' => 'required',
            'country' => 'required',
            'postalCode' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.unique' => 'Email have to be unique!',
            'name.required' => 'Name is required!',
            'password.required' => 'Password is required!',
            'refer_number.required' => 'Rerer number is required!',
            'address.required' => 'Address is required!',
            'country.required' => 'Country is required!',
            'postalCode.required' => 'Postal Code is required!',
        ];
    }


    
}
