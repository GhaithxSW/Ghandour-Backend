<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ResearchRequest extends FormRequest
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
            'title' => 'required',
            'image' => ['required', 'image', 'sometimes'],
            'content' => 'required',
            'pdf_file' => ['nullable', 'mimes:pdf', 'max:8192'],
            'docx_file' => ['nullable', 'mimes:doc,docx,zip', 'max:8192'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان البحث مطلوب',
            'image' => 'صورة البحث مطلوبة',
            'content.required' => 'محتوى البحث مطلوب'
        ];
    }
}
