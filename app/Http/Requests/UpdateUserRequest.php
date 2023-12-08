<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'nullable',
            'email' => ['nullable', 'email', 'unique:users'],
            'password' => ['nullable', 'confirmed', 'min:6'],
            'phone' => ['nullable', 'min:10', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('trans.email_required'),
            'email.email' => __('trans.email_validation'),
            'email.unique' => __('trans.email_unique'),
            'phone.numeric' => __('trans.phone_numeric'),
            'phone.min' => __('trans.phone_min'),
            'education_level.required' => __('trans.education_level_required'),
            'research_topic.required' => __('trans.research_topic_required')
        ];
    }
}
