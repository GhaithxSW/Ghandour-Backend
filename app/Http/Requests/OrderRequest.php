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
            'phone' => 'required',
            'education_level' => 'required',
            'research_topic' => 'required',
            'teacher_name' => 'nullable',
            'notes' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => __('trans.phone_required'),
            'education_level.required' => __('trans.education_level_required'),
            'research_topic.required' => __('trans.research_topic_required')
        ];
    }
}
