<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $guarded = [];

    public function session()
    {
        return $this->belongsTo(CourseSession::class, 'course_session_id');
    }
}
