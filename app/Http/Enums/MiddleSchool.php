<?php

namespace App\Http\Enums;

enum MiddleSchool: string
{
    case SeventhGrade_en = "Seventh Grade";
    case EighthGrade_en = "Eighth Grade";
    case NinthGrade_en = "Ninth Grade";

    case SeventhGrade_ar = "الصف السابع";
    case EighthGrade_ar = "الصف الثامن";
    case NinthGrade_ar = "الصف التاسع";

    public static function getMiddleSchoolEnglish()
    {
        return [
            self::SeventhGrade_en, self::EighthGrade_en, self::NinthGrade_en
        ];
    }

    public static function getMiddleSchoolArabic()
    {
        return [
            self::SeventhGrade_ar, self::EighthGrade_ar, self::NinthGrade_ar
        ];
    }
}
