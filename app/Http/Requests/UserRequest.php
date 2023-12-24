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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => ['required', 'min:10', 'numeric', 'unique:users', 'sometimes'],
            'email' => ['required', 'email', 'unique:users'],
            'country' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'الاسم الأول مطلوب',
            'last_name.required' => 'اسم العائلة مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.min' => 'رقم الهاتف يجب أن يكون 10 أرقام على الأقل',
            'phone.numeric' => 'رقم الهاتف يجب أن يكون أرقام فقط',
            'phone.unique' => 'رقم الهاتف موجود مسبقا',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'email.unique' => 'البريد الإلكتروني موجود مسبقًا',
            'country.required' => 'يجب تحديد الدولة',
        ];
    }
}
