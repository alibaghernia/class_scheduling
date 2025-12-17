<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function prerequisites(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'course_prerequisites',
            'course_id',               // کلید این درس
            'prerequisite_course_id'   // کلید پیش‌نیاز
        );
    }

    public function prerequisiteFor(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'course_prerequisites',
            'prerequisite_course_id',  // این درس به عنوان پیش‌نیاز
            'course_id'                // درسی که به آن وابسته است
        );
    }


    public function corequisites(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'course_corequisites',
            'course_id',               // کلید این درس
            'corequisite_course_id'   // کلید پیش‌نیاز
        );
    }

    public function corequisiteFor(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'course_corequisites',
            'corequisite_course_id',  // این درس به عنوان پیش‌نیاز
            'course_id'                // درسی که به آن وابسته است
        );
    }

    public function components()
    {
        return $this->belongsToMany(
            Course::class,
            'course_components',
            'composite_course_id',
            'component_course_id'
        )->using(CourseComponent::class);
    }
}
