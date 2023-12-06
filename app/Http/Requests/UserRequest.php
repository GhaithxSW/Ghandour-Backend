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
            'phone' => ['required', 'min:10']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم المستخدم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'email.unique' => 'البريد الإلكتروني موجود مسبقًا',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.confirmed' => 'كلمة المرور غير مطابقة',
            'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.min' => 'رقم الهاتف يجب أن يكون على الأقل 10 أحرف',
        ];
    }
}
