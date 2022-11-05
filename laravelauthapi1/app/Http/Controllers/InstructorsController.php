<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\StudentsRequest;
// use App\Http\Resources\StudentsResource;

class InstructorsController extends Controller
{
    public function instructorregister(Request $request){
        $instructor = Instructor::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'area_of_expertise' => $request->area_of_expertise,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        $instructor->users()->create();

        if($instructor){
            return response()->json([
                $instructor, 'status'=>true
            ]);  
        }else{
            return response()->json(['status'=>false]);
        }
    }
    public function instructorlog(Request $request){
        $credentials = request(['email', 'password']);

        if(! $token = auth()->guard('instructor-api')->attempt($credentials)){
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
        return response()->json(auth()->guard('instructor-api')->user());
    }
    
    public function instructorlogout()
    {
        auth()->guard('instructor-api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function update ($request, Instructor $instructor){
        $instructor->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email  
        ]);
       
       // return new StudentsResource($student);
    }
    public function show(Instructor $instructor){
        //return new StudentsResource($student);
    }

    public function index(){
       //return StudentsResource::collection(Student::all()); 
    }

    public function destroy(Instructor $instructor){
        $instructor->delete();
        return response(null, 204);
    }
}
