<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Enums\HighSchool;
use App\Http\Enums\University;
use App\Http\Enums\MiddleSchool;
use App\Http\Enums\GraduateStudy;
use App\Http\Enums\EducationLevel;
use App\Http\Requests\OrderRequest;
use App\Http\Services\OrderService;
use Illuminate\Support\Facades\App;
use App\Http\Enums\ResearchLanguage;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function orderResearch()
    {
        $educationLevelEnglish = EducationLevel::getEducationLevelEnglish();
        $educationLevelArabic = EducationLevel::getEducationLevelArabic();

        $middleSchoolGradesEnglish = MiddleSchool::getMiddleSchoolEnglish();
        $middleSchoolGradesArabic = MiddleSchool::getMiddleSchoolArabic();

        $highSchoolGradesEnglish = HighSchool::getHighSchoolEnglish();
        $highSchoolGradesArabic = HighSchool::getHighSchoolArabic();

        $universityGradesEnglish = University::getUniversityEnglish();
        $universityGradesArabic = University::getUniversityArabic();

        $graduateStudiesEnglish = GraduateStudy::getGraduateStudyEnglish();
        $graduateStudiesArabic = GraduateStudy::getGraduateStudyArabic();

        $researchLanguageEnglish = ResearchLanguage::getResearchLanguageEnglish();
        $researchLanguageArabic = ResearchLanguage::getResearchLanguageArabic();

        $locale = App::getLocale();

        return ($locale == 'en') ? view(
            'pages.request-research',
            ['title' => __('trans.bhoothat')],
            [
                'educationLevelEnglish' => $educationLevelEnglish,
                'middleSchoolGradesEnglish' => $middleSchoolGradesEnglish,
                'highSchoolGradesEnglish' => $highSchoolGradesEnglish,
                'universityGradesEnglish' => $universityGradesEnglish,
                'graduateStudiesEnglish' => $graduateStudiesEnglish,
                'researchLanguageEnglish' => $researchLanguageEnglish,
            ]
        )
            : view(
                'pages-rtl.request-research',
                ['title' => __('trans.bhoothat')],
                [
                    'educationLevelArabic' => $educationLevelArabic,
                    'middleSchoolGradesArabic' => $middleSchoolGradesArabic,
                    'highSchoolGradesArabic' => $highSchoolGradesArabic,
                    'universityGradesArabic' => $universityGradesArabic,
                    'graduateStudiesArabic' => $graduateStudiesArabic,
                    'researchLanguageArabic' => $researchLanguageArabic,
                ]
            );
    }

    public function storeOrder(OrderRequest $request)
    {
        try {
            $this->orderService->storeOrder($request);
            return redirect()->back();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
