<?php

namespace App\Http\Enums;

enum University: string
{
    case FirstYear_en = "First Year";
    case SecondYear_en = "Second Year";
    case ThirdYear_en = "Third Year";
    case FourthYear_en = "Fourth Year";
    case FifthYear_en = "Fifth Year";
    case SixthYear_en = "Sixth Year";

    case FirstYear_ar = "السنة الأولى";
    case SecondYear_ar = "السنة الثانية";
    case ThirdYear_ar = "السنة الثالثة";
    case FourthYear_ar = "السنة الرابعة";
    case FifthYear_ar = "السنة الخامسة";
    case SixthYear_ar = "السنة السادسة";

    public static function getUniversityEnglish()
    {
        return [
            self::FirstYear_en, self::SecondYear_en, self::ThirdYear_en, self::FourthYear_en, self::FifthYear_en, self::SixthYear_en
        ];
    }

    public static function getUniversityArabic()
    {
        return [
            self::FirstYear_ar, self::SecondYear_ar, self::ThirdYear_ar, self::FourthYear_ar, self::FifthYear_ar, self::SixthYear_ar
        ];
    }
}
