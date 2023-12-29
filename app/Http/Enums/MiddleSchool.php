<?php

namespace App\Http\Enums;

enum MiddleSchool: string
{
    case seventhGrade_en = "First intermediate - seventh grade";
    case eighthGrade_en = "Second intermediate - eighth grade";
    case ninthGrade_en = "Third intermediate - ninth grade";

    case seventhGrade_ar = "أول متوسط - الصف السابع";
    case eighthGrade_ar = "ثاني متوسط - الصف الثامن";
    case ninthGrade_ar = "ثالث متوسط - الصف التاسع";

    public static function getMiddleSchoolEnglish()
    {
        return [
            self::seventhGrade_en, self::eighthGrade_en, self::ninthGrade_en
        ];
    }

    public static function getMiddleSchoolArabic()
    {
        return [
            self::seventhGrade_ar, self::eighthGrade_ar, self::ninthGrade_ar
        ];
    }
}
