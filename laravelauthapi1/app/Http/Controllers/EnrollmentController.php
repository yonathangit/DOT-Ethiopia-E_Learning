<?php

namespace App\Http\Controllers;

Use App\Models\Course;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    public function store(Course $course, User $user){
       $student = $user->userable;
       if($student instanceof \App\Models\Student){
           
       }
    }
      

    

}
