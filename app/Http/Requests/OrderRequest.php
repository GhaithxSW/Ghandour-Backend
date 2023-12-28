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

            // grades
            'middle_grade' => 'nullable',
            'high_grade' => 'nullable',
            'university_year' => 'nullable',
            'graduate_study' => 'nullable',

            'school' => 'nullable',
            'university' => 'nullable',

            'research_topic' => 'required',
            'teacher_name' => 'required',
            'research_lang' => 'required',
            'research_papers_count' => ['required', 'numeric'],
            'delivery_date' => 'required',
            'notes' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => trans('trans.first_name_required'),
            'last_name.required' => trans('trans.last_name_required'),
            'country.required' => trans('trans.country_required'),
            'phone.required' => trans('trans.phone_required'),
            'phone.min' => trans('trans.phone_min'),
            'phone.numeric' => trans('trans.phone_numeric'),
            'phone.unique' => trans('trans.phone_unique'),
            'email.required' => trans('trans.email_required'),
            'email.email' => trans('trans.email_validation'),
            'email.unique' => trans('trans.email_unique'),
            // 'education_level.required' => 'المستوى الدراسي مطلوب',
            // 'grade.required' => 'يجب تحديد الصف',
            'school.required' => trans('trans.school_required'),
            'research_topic.required' => trans('trans.research_topic_required'),
            'teacher_name.required' => trans('trans.teacher_name_required'),
            // 'research_lang.required' => 'يجب تحديد لغة حلقة البحث',
            'research_papers_count.required' => trans('trans.research_papers_count_required'),
            'research_papers_count.numeric' => 'عدد صفحات حلقة البحث يجب أن يكون أرقام فقط',
            'delivery_date.required' => trans('trans.delivery_date_required')
        ];
    }
}
