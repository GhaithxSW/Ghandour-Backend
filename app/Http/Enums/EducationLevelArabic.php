<?php

namespace App\Http\Enums;

enum EducationLevelArabic: string
{
    case middleSchool = "المرحلة المتوسطة";
    case hightSchool = "المرحلة الثانوية";
    case university = "المرحلة الجامعية";
    case masterDegree = "الدراسات العليا";

    public static function getEducationLevelArabic()
    {
        return [
            self::middleSchool, self::hightSchool, self::university, self::masterDegree
        ];
    }
}
