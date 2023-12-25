<?php

namespace App\Http\Enums;

enum GraduateStudy: string
{
    case master_en = "master's degrees";
    case doctoral_en = "doctoral degrees";

    case master_ar = "الماجستير";
    case doctoral_ar = "الدكتوراة";

    public static function getGraduateStudyEnglish()
    {
        return [
            self::master_en, self::doctoral_en
        ];
    }

    public static function getGraduateStudyArabic()
    {
        return [
            self::master_ar, self::doctoral_ar
        ];
    }
}
