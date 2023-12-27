<?php

namespace App\Http\Enums;

enum HighSchool: string
{
    case TenthGrade_en = "First secondary school - tenth grade";
    case EleventhGradeSen_en = "Second secondary school - eleventh grade - scientific";
    case EleventhGradeLit_en = "Second secondary school - eleventh grade - literary";
    case BaccalaureateSen_en = "Third secondary school - twelfth grade - scientific";
    case BaccalaureateLit_en = "Third secondary school - twelfth grade - literary";

    case TenthGrade_ar = "أول ثانوي - الصف العاشر";
    case EleventhGradeSen_ar = "ثاني ثانوي - الصف الحادي عشر - علمي";
    case EleventhGradeLit_ar = "ثاني ثانوي - الصف الحادي عشر - أدبي";
    case BaccalaureateSen_ar = "ثالث ثانوي - الصف الثاني عشر - علمي";
    case BaccalaureateLit_ar = "ثالث ثانوي - الصف الثاني عشر - أدبي";

    public static function getHighSchoolEnglish()
    {
        return [
            self::TenthGrade_en, self::EleventhGradeSen_en, self::EleventhGradeLit_en, self::BaccalaureateSen_en, self::BaccalaureateLit_en
        ];
    }

    public static function getHighSchoolArabic()
    {
        return [
            self::TenthGrade_ar, self::EleventhGradeSen_ar, self::EleventhGradeLit_ar, self::BaccalaureateSen_ar, self::BaccalaureateLit_ar
        ];
    }
}
