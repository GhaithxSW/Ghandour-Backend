<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;
use App\Http\Enums\EducationLevelArabic;
use App\Http\Enums\EducationLevelEnglish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educationLevelEnglish = EducationLevelEnglish::getEducationLevelEnglish();
        $educationLevelArabic = EducationLevelArabic::getEducationLevelArabic();

        foreach ($educationLevelEnglish as $key => $en) {
            $educationLevel = EducationLevel::create([
                'name_en' => $en,
            ]);
            $educationLevel->update(['name_ar' => $educationLevelArabic[$key]]);
        }
    }
}
