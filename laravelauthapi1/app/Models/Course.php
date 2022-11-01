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

    public function enrollers(){
        return $this->belongsToMany(Student::class);
    }
}
