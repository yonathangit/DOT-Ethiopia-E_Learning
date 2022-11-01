<?php

namespace App\Http\Controllers;

Use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    public function store(Course $course){
       
        $course->enrollers()->create([
             'user_id' => auth()->user()->id  
        ]);
        
    }
      

    

}
