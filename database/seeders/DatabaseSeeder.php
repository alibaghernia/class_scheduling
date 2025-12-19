<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CurriculumPlan;
use App\Models\Major;
use App\Models\MajorSpecialization;
use App\Models\Professor;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Livewire\Mechanisms\HandleComponents\Synthesizers\StdClassSynth;
use stdClass;
use App\Enums\WeekDays;
use Illuminate\Database\Eloquent\Collection;

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

        $curriculumPlans = \App\Models\CurriculumPlan::all();
        foreach ($curriculumPlans as $curriculumPlan) {
            $majors = $curriculumPlan->majors;
            foreach ($majors as $major) {
                $majorSpecializations = $major->majorSpecializations;
                foreach ($majorSpecializations as $majorSpecialization) {
                    /** @var Collection $semesters */
                    $semesters = $majorSpecialization->semesters;
                    foreach ($semesters as $semesterIndex => $semester) {
                        if ($semesterIndex === 0) {
                            continue;
                        }
                        /** @var Collection $courses */
                        $courses = $semester->courses;
                        $cloneCourses = clone $courses;

                        $matches = [
                            1 => ['c' => 1, 'p' => 3],
                            2 => ['c' => 1, 'p' => 5],
                            4 => ['c' => 0, 'p' => 7],
                            3 => ['c' => 0, 'p' => 7],
                            5 => ['c' => 2, 'p' => 5],
                            6 => ['c' => 0, 'p' => 7],
                            7 => ['c' => 2, 'p' => 3],
                        ];
                        $semesterMatch = $matches[$semesterIndex];
                        $co = min($semesterMatch['c'], count($courses));
                        $pre = min($semesterMatch['p'], count($courses));
                        $toPreSemester = random_int(1, 8) === 1 ? 3 : 2;
                        $toPreSemester = min($toPreSemester, $semesterIndex);
                        $preCourses = [];
                        for ($i = $semesterIndex - 1; $i >= $semesterIndex - $toPreSemester; $i--) {
                            $preCourses = [
                                ...$preCourses,
                                ...$semesters[$i]->courses,
                            ];
                        }

                        $arrayCourses = [...$cloneCourses];

                        for ($j = 0; $j < $co; $j++) {
                            shuffle($arrayCourses);
                            shuffle($preCourses);
                            /** @var Course $course */
                            $course = $arrayCourses[$j];
                            $course->corequisites()->syncWithoutDetaching($preCourses[$j]->id);
                        }

                        for ($k = 0; $k < $pre; $k++) {
                            shuffle($arrayCourses);
                            shuffle($preCourses);
                            /** @var Course $course */
                            $course = $arrayCourses[$k];
                            $course->prerequisites()->syncWithoutDetaching($preCourses[$k]->id);
                        }
                    }
                }
            }
        }

        Professor::factory()
            ->count(intval(Course::count() / 4) + 1)
            ->create();

    }
}
