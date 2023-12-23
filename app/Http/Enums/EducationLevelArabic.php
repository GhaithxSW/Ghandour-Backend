<?php

namespace App\Http\Enums;

enum EducationLevelArabic: string
{
    case middleSchool = "المرحلة الاعدادية";
    case hightSchool = "المرحلة الثانوية";
    case university = "المرحلة الجامعية";
    case masterDegree = "الماجستير";

    public static function getEducationLevelArabic()
    {
        return [
            self::middleSchool, self::hightSchool, self::university, self::masterDegree
        ];
    }
}
