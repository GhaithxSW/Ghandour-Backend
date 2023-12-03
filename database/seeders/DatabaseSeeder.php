<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\EducationLevel;
use Illuminate\Database\Seeder;
use App\Http\Enums\EducationLevelArabic;
use App\Http\Enums\EducationLevelEnglish;
use App\Models\ResearchRequest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();

        // $educationLevelEnglish = EducationLevelEnglish::getEducationLevelEnglish();
        // $educationLevelArabic = EducationLevelArabic::getEducationLevelArabic();

        // foreach ($educationLevelEnglish as $en) {
        //     EducationLevel::create([
        //         'name_en' => $en
        //     ]);
        // }

        // foreach ($educationLevelArabic as $ar) {
        //     EducationLevel::create([
        //         'name_ar' => $ar
        //     ]);
        // }
    }
}
