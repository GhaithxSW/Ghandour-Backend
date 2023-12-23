<?php

namespace App\Http\Enums;

enum EducationLevelEnglish: string
{
    case middleSchool = "Middle School";
    case hightSchool = "High School";
    case university = "University";
    case masterDegree = "Master's Degree";

    public static function getEducationLevelEnglish()
    {
        return [
            self::middleSchool, self::hightSchool, self::university, self::masterDegree
        ];
    }
}
