<?php

namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\ModulesResource;

class ModulesController extends Controller
{
    public function store(Request $request, Course $course){
       $module = $course->modules()->create([
            'name' => $request->name,
            'notes' => $request->notes
        ]);
    
           return new ModulesResource($module);
    }
    public function update (Request $request, Course $course, Module $module){
         $upd = $course->modules()->find($module->id);
       
        $upd->update([
            'name' => $request->name,
            'notes' => $request->notes,  
        ]);
       
        return new ModulesResource($module);
    }
    public function index(Request $request, Course $course){
        return ModulesResource::collection($course->modules()->get()); 
     }
     public function show(Course $course, Module $module){
        $show = $course->modules()->find($module->id);
        return new ModulesResource($show);
    }
    public function destroy(Course $course, Module $module){
        $del = $course->modules()->find($module->id);
        $del->delete();
        return response([
            'message' => 'Module information deleted!'
        ], 204);
    }
}
