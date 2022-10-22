<?php

namespace App\Http\Controllers;
use App\Http\Resources\CoursesResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){
        return CoursesResource::collection(Course::all());
    }

    public function show(Course $course){
       return new CoursesResource($course);
    }

    public function update(Request $request, Course $course){
        $course->update([
            'title' => $request->input('title')
        ]);

        return new CoursesResource($course);
    }
    public function store(Request $request){
       $course = Course::create([
         'title' => $request->title 
       ]);
       
       return new CoursesResource($course);
        
    }
    public function destroy(Course $course){
        $course->delete();
        return response(null, 204); 
    }
}
