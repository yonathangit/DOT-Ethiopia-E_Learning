<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    use HasFactory;

    protected $fillable = [
        'id',
        'firstname',
        'lastname'
    ];
    public function user() {
        return $this->morphOne(User::class, 'userable');
    }
    
    public function courses(){
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
    }

}
