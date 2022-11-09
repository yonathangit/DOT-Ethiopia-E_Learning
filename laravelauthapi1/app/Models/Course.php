<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $guarded = "";

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id')
                    ->withPivot('status')
                    ->withTimestamps();
    }
    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }
}
