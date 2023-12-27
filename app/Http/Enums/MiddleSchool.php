<?php

namespace App\Http\Enums;

enum MiddleSchool: string
{
    case SeventhGrade_en = "First intermediate - seventh grade";
    case EighthGrade_en = "Second intermediate - eighth grade";
    case NinthGrade_en = "Third intermediate - ninth grade";

    case SeventhGrade_ar = "أول متوسط - الصف السابع";
    case EighthGrade_ar = "ثاني متوسط - الصف الثامن";
    case NinthGrade_ar = "ثالث متوسط - الصف التاسع";

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
