<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSession extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Hubungan ke konten-konten
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
