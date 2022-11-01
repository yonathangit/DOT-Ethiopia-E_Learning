<?php

namespace App\Http\Controllers;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Resources\ModulesResource;

class ModulesController extends Controller
{
    public function store(Request $request){
        $module = Module::create([
            'name' => $request->name,
            'notes' => $request->notes
           ]);
    
           return new ModulesResource($module);
    }
    public function update (Request $request, Module $module){
        $module->update([
            'name' => $request->name,
            'notes' => $request->notes  
        ]);
       
        return new ModulesResource($module);
    }
    public function index(Request $request){
        return ModulesResource::collection(Module::all()); 
     }
     public function show(Module $module){
        return new ModulesResource($module);
    }
    public function destroy(Module $module){
        $module->delete();
        return response([
            'message' => 'Module information deleted!'
        ], 204);
    }
}
