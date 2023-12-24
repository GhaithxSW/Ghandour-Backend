<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class OrderRequest extends FormRequest
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
            'country' => 'required',
            'phone' => ['required', 'min:10', 'numeric', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'education_level' => 'required',
            'grade' => 'required',
            'school' => 'required',
            'research_topic' => 'required',
            'teacher_name' => 'required',
            'research_lang' => 'required',
            'research_papers_count' =>  ['required', 'numeric'],
            'delivery_date' => 'required',
            'notes' => 'nullable',

            'stripeToken' => 'nullable'
        ];
    }

    public function messages()
    {
        // return [
        //     'first_name.required' => __('trans.first_name_required'),
        //     'last_name.required' => __('trans.last_name_required'),
        //     'phone.required' => __('trans.phone_required'),
        //     'phone.min' => __('trans.phone_min'),
        //     'phone.numeric' => __('trans.phone_numeric'),
        //     'phone.unique' => __('trans.phone_unique'),
        //     'email.required' => __('trans.email_required'),
        //     'email.email' => __('trans.email_validation'),
        //     'email.unique' => __('trans.email_unique'),
        //     'education_level.required' => __('trans.education_level_required'),
        //     'research_topic.required' => __('trans.research_topic_required'),
        //     'teacher_name.required' => __('trans.teacher_name_required'),
        //     'research_lang.required' => __('trans.research_lang_required'),
        //     'research_duration.required' => __('trans.research_duration_required')
        // ];

        return [
            'first_name.required' => 'الاسم الأول مطلوب',
            'last_name.required' => 'اسم العائلة مطلوب',
            'country' => 'يجب تحديد الدولة',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.min' => 'رقم الهاتف يجب أن يكون 10 أرقام على الأقل',
            'phone.numeric' => 'رقم الهاتف يجب أن يكون أرقام فقط',
            'phone.unique' => 'رقم الهاتف موجود مسبقا',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'email.unique' => 'البريد الإلكتروني موجود مسبقًا',
            'education_level.required' => 'المستوى الدراسي مطلوب',
            'grade.required' => 'يجب تحديد الصف',
            'school.required' => 'اسم المدرسة مطلوب',
            'research_topic.required' => 'عنوان البحث مطلوب',
            'teacher_name.required' => 'اسم المعلم/ة مطلوب',
            'research_lang.required' => 'يجب تحديد لغة حلقة البحث',
            'research_papers_count.required' => 'يجب تحديد عدد صفحات حلقة البحث',
            'research_papers_count.numeric' => 'عدد صفحات حلقة البحث يجب أن يكون أرقام فقط',
            'delivery_date.required' => 'يجب تحديد المدة المطلوبة لتلبية حبقة البحث'
        ];
    }
}
