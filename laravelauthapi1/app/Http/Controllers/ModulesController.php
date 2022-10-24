<?php

namespace App\Http\Controllers;
use App\Models\Module;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function store(Request $request){
        $module = Module::create([
            'name' => $request->name,
            'description' => $request->description
           ]);
    
           return new StudentsResource($student);
    }
}
