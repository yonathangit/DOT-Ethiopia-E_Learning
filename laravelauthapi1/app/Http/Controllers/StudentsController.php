<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StudentsRequest;
use App\Http\Resources\StudentsResource;

class StudentsController extends Controller
{
    public function studentregister(Request $request){
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'password' => ['required', Password::defaults()],
        ]);
        
        $student = Student::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $student->users()->create();

        if($student){
            return response()->json([
                $student, 'status'=>true
            ]);  
        }else{
            return response()->json(['status'=>false]);
        }
    }
    public function studentlog(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if(! $token = auth()->guard('student-api')->attempt($credentials)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
            
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function me()

    {
        return response()->json(auth()->guard('student-api')->user());
    }
    
    public function studentlogout()
    {
        auth()->guard('student-api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function update (StudentsRequest $request, Student $student){
        $student->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email  
        ]);
       
        return new StudentsResource($student);
    }
    public function show(Student $student){
        return new StudentsResource($student);
    }

    public function index(){
       return StudentsResource::collection(Student::all()); 
    }

    public function destroy(Student $student){
        $student->delete();
        return response(null, 204);
    }
}
