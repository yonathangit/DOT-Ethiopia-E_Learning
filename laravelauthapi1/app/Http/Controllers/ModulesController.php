<?php

namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Resources\ModulesResource;

class ModulesController extends Controller
{
    use HttpResponses;
    public function store(Request $request, Course $course){
        if(auth()->guard('instructor-api')->user()->id !== $course->instructor_id){
            return $this->error('', 'You are not authorized to make this request', 403);
         }
         if($request->has('pictures')){
            $photo = $request->file('pictures');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move('photos/modules/',$name);
            $module = $course->modules()->create([
                'course_id' => $course->id,
                'pictures' => $name,
                'name' => $request->name,
                'notes' => $request->notes,
                'youtube_url' => $request->youtube_url
            ]);
        
               return new ModulesResource($module);
        }
        return response()->json('Please Try Again!');
       
    }
    public function update (Request $request, Course $course, Module $module){
        if(auth()->guard('instructor-api')->user()->id !== $course->instructor_id){
            return $this->error('', 'You are not authorized to make this request', 403);
         }
         $data = $request->validate([
            'name' => 'required',
            'notes' => 'required',
            'youtube_url' => 'url',
            'pictures' => ''
         ]);
         $upd = $course->modules()->find($module->id);
         if($request->has('pictures')){
            $photo = $request->file('pictures');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move('photos/modules/',$name);

        }
        $upd->update(array_merge(
            $data,
            ['pictures' => $name]
        ));
       
        return new ModulesResource($upd);
    }
    public function index(Request $request, Course $course){
       
        return ModulesResource::collection($course->modules()->get()); 
     }
     public function show(Course $course, Module $module){
        $show = $course->modules()->find($module->id);
        return new ModulesResource($show);
    }
    public function destroy(Course $course, Module $module){
        if(auth()->guard('instructor-api')->user()->id !== $course->instructor_id){
            return $this->error('', 'You are not authorized to make this request', 403);
         }
        $del = $course->modules()->find($module->id);
        $del->delete();
        return response([
            'message' => 'Module information deleted!'
        ], 204);
    }

    
}
