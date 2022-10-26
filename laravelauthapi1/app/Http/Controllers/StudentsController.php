<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentsRequest;
use App\Http\Resources\StudentsResource;
<<<<<<< HEAD
class StudentsController extends Controller
{
    public function update (StudentsRequest $request, Student $student){
        $student->update([
            'name' => $request->input('name')  
=======

class StudentsController extends Controller
{
    
    public function update (StudentsRequest $request, Student $student){
        $student->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email')  
>>>>>>> ba2a9a571c11f5b8b536f0a0a32be86772368c96
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
<<<<<<< HEAD
        'name' => $request->name
=======
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email')  
>>>>>>> ba2a9a571c11f5b8b536f0a0a32be86772368c96
       ]);

       return new StudentsResource($student);
    }

    public function destroy(Student $student){
        $student->delete();
<<<<<<< HEAD
        return response([
            'message' => 'student information deleted!'
        ], 204);
    }
}
=======
        return response(null, 204);
    }
}
>>>>>>> ba2a9a571c11f5b8b536f0a0a32be86772368c96
