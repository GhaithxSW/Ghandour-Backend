<?php

namespace App\Http\Enums;

enum University: string
{
    case firstYear_en = "First Year";
    case secondYear_en = "Second Year";
    case thirdYear_en = "Third Year";
    case fourthYear_en = "Fourth Year";
    case fifthYear_en = "Fifth Year";
    case sixthYear_en = "Sixth Year";

    case firstYear_ar = "السنة الأولى";
    case secondYear_ar = "السنة الثانية";
    case thirdYear_ar = "السنة الثالثة";
    case fourthYear_ar = "السنة الرابعة";
    case fifthYear_ar = "السنة الخامسة";
    case sixthYear_ar = "السنة السادسة";

    public static function getUniversityEnglish()
    {
        return [
            self::firstYear_en, self::secondYear_en, self::thirdYear_en, self::fourthYear_en, self::fifthYear_en, self::sixthYear_en
        ];
    }

    public static function getUniversityArabic()
    {
        return [
            self::firstYear_ar, self::secondYear_ar, self::thirdYear_ar, self::fourthYear_ar, self::fifthYear_ar, self::sixthYear_ar
        ];
    }
}
