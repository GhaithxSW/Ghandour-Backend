<?php

namespace Database\Seeders;

use App\Http\Enums\EducationLevel as EducationLevelEnum;
use App\Models\EducationLevel;
use Illuminate\Database\Seeder;
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
        $educationLevelEnglish = EducationLevelEnum::getEducationLevelEnglish();
        $educationLevelArabic = EducationLevelEnum::getEducationLevelArabic();

        foreach ($educationLevelEnglish as $key => $en) {
            $educationLevel = EducationLevel::create([
                'name_en' => $en,
            ]);
            $educationLevel->update(['name_ar' => $educationLevelArabic[$key]]);
        }
    }
}
