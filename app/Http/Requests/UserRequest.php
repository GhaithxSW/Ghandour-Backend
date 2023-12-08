<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
            'phone' => ['required', 'min:10', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('trans.name_required'),
            'email.required' => __('trans.email_required'),
            'email.email' => __('trans.email_validation'),
            'email.unique' => __('trans.email_unique'),
            'password.required' => __('trans.password_required'),
            'password.confirmed' => __('trans.password_confirmed'),
            'password.min' => __('trans.password_min'),
            'phone.required' => __('trans.phone_required'),
            'phone.min' => __('trans.phone_min'),
            'phone.numeric' => __('trans.phone_numeric')
        ];
    }
}
