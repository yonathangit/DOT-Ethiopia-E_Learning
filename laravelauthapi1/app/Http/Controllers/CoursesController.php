<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CoursesRequest;
use App\Http\Resources\CoursesResource;
use App\Traits\HttpResponses;
class CoursesController extends Controller
{
    use HttpResponses;

    public function index(){
        return CoursesResource::collection(
            Course::where('instructor_id', auth()->guard('instructor-api')->user()->id)->get()
        );
    }

    public function show(Course $course){
        
       return $this->isNotAuthorized($course)?$this->isNotAuthorized($course):new CoursesResource($course);
    }

    public function update(Course $course, Request $request){
        if(auth()->guard('instructor-api')->user()->id !== $course->instructor_id){
            return $this->error('', 'You are not authorized to make this request', 403);
         }
       $course->update($request->all());

        return new CoursesResource($course);
    }
    public function showToAll(){
        return CoursesResource::collection(Course::all());
    }
    public function store(CoursesRequest $request){
        $request->validated($request->all());

        $instructor = auth()->guard('instructor-api')->user();
       $newdata = $instructor->courses()->create([
          'instructor_id' => $instructor->id,
          'title' => $request->title,
          'description' => $request->description
       ]);
        
    //    $course = Course::create([
    //      'title' => $request->title, 
    //      'description' => $request->description
    //    ]);
       
       return new CoursesResource($newdata);
        
    }
    public function destroy(Course $course){
       
       return $this->isNotAuthorized($course) ? $this->isNotAuthorized($course) : $course->delete();
        
    }

    private function isNotAuthorized($course){
        if(auth()->guard('instructor-api')->user()->id !== $course->instructor_id){
           return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
