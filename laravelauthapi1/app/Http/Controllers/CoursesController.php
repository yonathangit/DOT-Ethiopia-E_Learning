<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CoursesRequest;
use App\Http\Resources\CoursesResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\DB;
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
        if($request->has('photo')){
            $photo = $request->file('photo');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move('photos/',$name);
            $newdata = $instructor->courses()->create([
                'instructor_id' => $instructor->id,
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $name
             ]);
             return new CoursesResource($newdata);
        }

        return response()->json('Please Try Again!');
        
        
    //    $course = Course::create([
    //      'title' => $request->title, 
    //      'description' => $request->description
    //    ]);
       
      
        
    }
    
    public function search($name){
        $courses = Course::where('title', 'like', '%'.$name.'%')->get();
        return response()->json($courses);
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
