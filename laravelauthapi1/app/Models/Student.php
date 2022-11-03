<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
    ];
    
    public function user(){
        return $this->belongsTo(User::class,'id');
    }
    
    public function enrolling(){
        return $this->belongsToMany(Course::class);
    }

}
