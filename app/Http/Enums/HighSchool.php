<?php

namespace App\Http\Enums;

enum HighSchool: string
{
    case tenthGrade_en = "First secondary school - tenth grade";
    case eleventhGradeSen_en = "Second secondary school - eleventh grade - scientific";
    case eleventhGradeLit_en = "Second secondary school - eleventh grade - literary";
    case baccalaureateSen_en = "Third secondary school - twelfth grade - scientific";
    case baccalaureateLit_en = "Third secondary school - twelfth grade - literary";

    case tenthGrade_ar = "أول ثانوي - الصف العاشر";
    case eleventhGradeSen_ar = "ثاني ثانوي - الصف الحادي عشر - علمي";
    case eleventhGradeLit_ar = "ثاني ثانوي - الصف الحادي عشر - أدبي";
    case baccalaureateSen_ar = "ثالث ثانوي - الصف الثاني عشر - علمي";
    case baccalaureateLit_ar = "ثالث ثانوي - الصف الثاني عشر - أدبي";

    public static function getHighSchoolEnglish()
    {
        return [
            self::tenthGrade_en, self::eleventhGradeSen_en, self::eleventhGradeLit_en, self::baccalaureateSen_en, self::baccalaureateLit_en
        ];
    }

    public static function getHighSchoolArabic()
    {
        return [
            self::tenthGrade_ar, self::eleventhGradeSen_ar, self::eleventhGradeLit_ar, self::baccalaureateSen_ar, self::baccalaureateLit_ar
        ];
    }
}
