<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'childName' => 'required|string',
            'childAge' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'يجب إدخال بريد إلكتروني صالح',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'يجب أن تحتوي كلمة المرور على 6 أحرف على الأقل',
            'childName.required' => 'اسم الطفل مطلوب',
            'childAge.required' => 'عمر الطفل مطلوب',
            'childAge.integer' => 'يجب أن يكون عمر الطفل رقمًا صحيحًا',
        ];
    }
}
