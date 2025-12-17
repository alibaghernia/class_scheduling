<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseComponent extends Pivot
{
    /** @use HasFactory<\Database\Factories\CourseComponentFactory> */
    use HasFactory;

    public function composite(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'composite_course_id');
    }

    public function component(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'component_course_id');
    }
}
