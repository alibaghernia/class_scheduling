<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorSpecialization extends Model
{
    /** @use HasFactory<\Database\Factories\MajorSpecializationFactory> */
    use HasFactory;

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }
}
