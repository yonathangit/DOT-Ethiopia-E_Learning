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
            'description' => $request->description
           ]);
    
           return new ModulesResource($module);
    }
    public function update (Request $request, Module $module){
        $module->update([
            'name' => $request->name,
            'description' => $request->description  
        ]);
       
        return new ModulesResource($module);
    }
}
