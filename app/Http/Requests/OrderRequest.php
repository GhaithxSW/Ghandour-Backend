<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'phone' => ['required', 'min:10', 'numeric', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'education_level' => 'required',
            'research_topic' => 'required',
            'teacher_name' => 'required',
            'research_lang' => 'required',
            'research_duration' => 'required',
            'notes' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('trans.first_name_required'),
            'last_name.required' => __('trans.last_name_required'),
            'phone.required' => __('trans.phone_required'),
            'phone.numeric' => __('trans.phone_numeric'),
            'phone.min' => __('trans.phone_min'),
            'email.required' => __('trans.email_required'),
            'email.email' => __('trans.email_validation'),
            'email.unique' => __('trans.email_unique'),
            'education_level.required' => __('trans.education_level_required'),
            'research_topic.required' => __('trans.research_topic_required'),
            'teacher_name.required' => __('trans.teacher_name_required'),
            'research_lang.required' => __('trans.research_lang_required'),
            'research_duration.required' => __('trans.research_duration')
        ];
    }
}
