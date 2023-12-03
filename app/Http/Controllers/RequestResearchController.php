<?php

namespace App\Http\Controllers;

use App\Http\Enums\EducationLevelArabic;
use App\Http\Enums\EducationLevelEnglish;
use App\Models\EducationLevel;
use App\Models\ResearchRequest;
use Illuminate\Http\Request;

class RequestResearchController extends Controller
{
    public function requestResearch()
    {
        $educationLevels = EducationLevel::all();

        if (app()->getLocale() == 'en') return view('pages.request-research', ['title' => __('trans.bhoothat')], ['educationLevels' => $educationLevels]);
        if (app()->getLocale() == 'ar') return view('pages-rtl.request-research', ['title' => __('trans.bhoothat')], ['educationLevels' => $educationLevels]);
    }

    public function storeRequestResearch(Request $request)
    {
        try {
            $formFields = $request->validate([
                'phone' => 'required',
                'education_level' => 'required',
                'research_topic' => 'required',
                'teacher_name' => 'nullable',
                'notes' => 'nullable'
            ], [
                'phone.required' => __('trans.phone_required'),
                'education_level.required' => __('trans.education_level_required'),
                'research_topic.required' => __('trans.research_topic_required')
            ]);

            $userId = auth()->user()->id;

            ResearchRequest::create([
                'phone' => $formFields['phone'],
                'education_level_id' => $formFields['education_level'],
                'research_topic' => $formFields['research_topic'],
                'teacher_name' => $formFields['teacher_name'],
                'notes' => $formFields['notes'],
                'user_id' => $userId
            ]);

            return redirect()->back()->with('success', __('trans.msg_request_success'));
        } catch (\Exception $e) {
            throw $e;
        }
    }

    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'pdf_file' => 'required|mimes:pdf|max:2048', // PDF file, max size 2MB
    //     ]);

    //     $file = $request->file('pdf_file');
    //     $fileName = time() . '_' . $file->getClientOriginalName();
    //     $file->storeAs('pdfs', $fileName, 'public'); // Store in storage/app/public/pdfs

    //     return redirect()->route('upload.form')->with('success', 'PDF file uploaded successfully.');
    // }

    // public function download($file)
    public function download()
    {
        // $filePath = storage_path("app/public/pdfs/{$file}");
        $filePath = storage_path("/test.pdf");

        return response()->download($filePath, basename($filePath));
    }
}
