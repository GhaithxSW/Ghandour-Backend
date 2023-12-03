<?php

namespace App\Http\Enums;

enum EducationLevelEnglish: string
{
    case hightSchool = "High School";
    case university = "University";
    case masterDegree = "Master's Degree";

    public static function getEducationLevelEnglish()
    {
        return [
            self::hightSchool, self::university, self::masterDegree
        ];
    }
}
