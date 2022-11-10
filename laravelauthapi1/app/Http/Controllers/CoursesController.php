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

    public function update(Course $course){
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',   
        ]);

        $instructor = auth()->guard('instructor-api')->user();
       $updatedData = $instructor->courses()->update($data);

        return new CoursesResource($updatedData);
    }
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
           
        ]);

        $instructor = auth()->guard('instructor-api')->user();
       $newdata = $instructor->courses()->create($data);
        
    //    $course = Course::create([
    //      'title' => $request->title, 
    //      'description' => $request->description
    //    ]);
       
       return new CoursesResource($newdata);
        
    }
    public function destroy(Course $course){

        $instructor = auth()->guard('instructor-api')->user();

        $instructor->courses()->delete($course);
        return response->json([
            "status" => "Course Deleted"
        ], 204); 
    }
}
