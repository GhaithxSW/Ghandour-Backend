<?php

namespace App\Http\Enums;

enum ResearchLanguage: string
{
    case arabic_en = "Arabic";
    case english_en = "English";
    case french_en = "French";

    case arabic_ar = "العربية";
    case english_ar = "الإنكليزية";
    case french_ar = "الفرنسية";

    public static function getResearchLanguageEnglish()
    {
        return [
            self::arabic_en, self::english_en, self::french_en
        ];
    }

    public static function getResearchLanguageArabic()
    {
        return [
            self::arabic_ar, self::english_ar, self::french_ar
        ];
    }
}
