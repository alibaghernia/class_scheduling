<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    /** @use HasFactory<\Database\Factories\SemesterFactory> */
    use HasFactory;

    public function majorSpecialization(): BelongsTo
    {
        return $this->belongsTo(MajorSpecialization::class);
    }

    public function courses(): Builder|HasMany
    {
        return $this->hasMany(Course::class);
    }
}
