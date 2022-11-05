<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'description',
        'photo',
        'category_id',
        'about_instructor',
        'view_count',
        'subscriber_count',
        'status',
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
