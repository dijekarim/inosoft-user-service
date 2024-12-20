<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function registrations() {
        return $this->hasMany(Registration::class);
    }

    public function prerequisites() {
        return $this->hasMany(CoursePrerequisite::class);
    }
}
