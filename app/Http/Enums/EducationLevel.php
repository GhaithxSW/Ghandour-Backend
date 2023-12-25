<?php

namespace App\Http\Enums;

enum EducationLevel: string
{
    case middleSchool_en = "Middle School";
    case highSchool_en = "High School";
    case university_en = "University";
    case graduateStudies_en = "Graduate Studies";

    case middleSchool_ar = "المرحلة المتوسطة";
    case highSchool_ar = "المرحلة الثانوية";
    case university_ar = "المرحلة الجامعية";
    case graduateStudies_ar = "الدراسات العليا";

    public static function getEducationLevelEnglish()
    {
        return [
            self::middleSchool_en, self::highSchool_en, self::university_en, self::graduateStudies_en
        ];
    }

    public static function getEducationLevelArabic()
    {
        return [
            self::middleSchool_ar, self::highSchool_ar, self::university_ar, self::graduateStudies_ar
        ];
    }
}
