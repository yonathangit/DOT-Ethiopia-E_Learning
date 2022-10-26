<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Requests\InstructorsRequest;
use App\Http\Resources\InstructorsResource;

class InstuctorsController extends Controller
{
        
    public function index()
    {
        return InstructorsResource::collection(Instructor::all());
    }

    

    
    public function store(Request $request)
    {
        $Instructor = User::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'address'=> $request->address,
            'date_of_birth'=>$request->date_of_birth,
            'gender'=> $request->gender,
            'field_of_study'=> $request->field_of_study,
            'level-of_study'=> $request->level_of_study,
            'phone_number'=> $request->phone_number,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'tc'=>json_decode($request->tc), 
        ]);
    
    }

    
    public function show($Instructor)
    {
        return new InstructorsResource($Instructor);
    }

    

    
    public function update(Request $request, Instructor $Instructor)
    {
        $Instructor->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email')  
        ]);
       
        return new InstructorsResource($Instructor);
    }

    
    public function destroy($Instructor)
    {
        $Instructor->delete();
        return response(null, 204);
    }
}

