<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Pivot 
{
    protected $table = "course_student";
    protected $fillable = [
        'student_id',
        'course_id',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'status' => \App\Enum\CourseEnrollEnum::class
    ];
}
