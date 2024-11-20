<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * courses
     */
    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function registrations() {
        return $this->hasMany(Registration::class);
    }
}