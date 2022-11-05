<?php

namespace App\Http\Controllers;

Use App\Models\Course;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:student-api');
    // }
    public function store(Course $course){
       
              
        
        //    $student->courses()->attach([
        //       'student_id' => $student->id,
        //       'course_id' => $course->id,
        //       'status' => \App\Enum\CourseEnrollEnum::ACTIVE    
        // ]);

         $student = auth()->guard('student-api')->user();
         $student->courses()->attach($course->id, [
            'status' => \App\Enum\CourseEnrollEnum::ACTIVE
       ]);
          return response()->json("success");
    
    }
      

    

}
