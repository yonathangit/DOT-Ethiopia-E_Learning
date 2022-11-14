<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = "modules";

    protected $fillable = [
        'course_id',
        'pictures',
        'youtube_url',
        'name',
        'notes'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
