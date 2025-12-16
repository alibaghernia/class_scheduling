<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CurriculumPlan;
use App\Models\Major;
use App\Models\MajorSpecialization;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Livewire\Mechanisms\HandleComponents\Synthesizers\StdClassSynth;
use stdClass;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ali Baghernia',
            'email' => 'ali@ali.com',
            'password' => '$2y$12$PzQ9g2QXmeL2yDCBPXLBxu72yfSO0SKzkDojXDjUPDsx1wm.Hu4lW',
        ]);

        $curriculumPlan = CurriculumPlan::create([
            'name' => 'ورودی 1400',
            'status' => 'active',
        ]);
        $computerMajor = Major::create([
            'curriculum_plan_id' => $curriculumPlan->id,
            'name' => 'Computer',
        ]);
        $majorSpecializationTitles = ['CS', 'CE', 'IT', 'AI',];
        foreach ($majorSpecializationTitles as $title) {
            $softwareMajorSpecialization = MajorSpecialization::create([
                'major_id' => $computerMajor->id,
                'name' => $title,
            ]);

            $s1 = Semester::create([
                'name' => 'Semester 1',
                'status' => 'active',
                'major_specialization_id' => $softwareMajorSpecialization->id,
            ]);

            $s2 = Semester::create([
                'name' => 'Semester 2',
                'status' => 'active',
                'major_specialization_id' => $softwareMajorSpecialization->id,
            ]);

            $s3 = Semester::create([
                'name' => 'Semester 3',
                'status' => 'active',
                'major_specialization_id' => $softwareMajorSpecialization->id,
            ]);

            $s4 = Semester::create([
                'name' => 'Semester 4',
                'status' => 'active',
                'major_specialization_id' => $softwareMajorSpecialization->id,
            ]);

            $s5 = Semester::create([
                'name' => 'Semester 5',
                'status' => 'active',
                'major_specialization_id' => $softwareMajorSpecialization->id,
            ]);

            $s6 = Semester::create([
                'name' => 'Semester 6',
                'status' => 'active',
                'major_specialization_id' => $softwareMajorSpecialization->id,
            ]);

            $s7 = Semester::create([
                'name' => 'Semester 7',
                'status' => 'active',
                'major_specialization_id' => $softwareMajorSpecialization->id,
            ]);

            $s8 = Semester::create([
                'name' => 'Semester 8',
                'status' => 'active',
                'major_specialization_id' => $softwareMajorSpecialization->id,
            ]);
            $semesters = [$s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8];
            foreach ($semesters as $semester) {
                Course::factory()
                    ->count(random_int(5, 8))
                    ->create([
                        'semester_id' => $semester->id,
                    ]);
            }
        }




    }
}
