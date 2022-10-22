<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentsRequest;
use App\Http\Resources\StudentsResource;

class StudentsController extends Controller
{
    public function update (StudentsRequest $request, Student $student){
        $student->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email')  
        ]);
       
        return new StudentsResource($student);
    }
    public function show(Student $student){
        return new StudentsResource($student);
    }

    public function index(){
       return StudentsResource::collection(Student::all()); 
    }

    public function store(Request $request){
       $student = Student::create([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email')  
       ]);

       return new StudentsResource($student);
    }

    public function destroy(Student $student){
        $student->delete();
        return response(null, 204);
    }
}