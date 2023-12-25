<?php

namespace App\Http\Enums;

enum HighSchool: string
{
    case TenthGrade_en = "Tenth Grade";
    case EleventhGrade_en = "Eleventh Grade";
    case Baccalaureate_en = "Baccalaureate";

    case TenthGrade_ar = "الصف العاشر";
    case EleventhGrade_ar = "الصف الحادي عشر";
    case Baccalaureate_ar = "البكالوريا شهادة الثانوية";

    public static function getHighSchoolEnglish()
    {
        return [
            self::TenthGrade_en, self::EleventhGrade_en, self::Baccalaureate_en
        ];
    }

    public static function getHighSchoolArabic()
    {
        return [
            self::TenthGrade_ar, self::EleventhGrade_ar, self::Baccalaureate_ar
        ];
    }
}
