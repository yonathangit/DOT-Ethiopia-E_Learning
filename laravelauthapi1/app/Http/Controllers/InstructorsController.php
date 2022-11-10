<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
// use App\Http\Requests\StudentsRequest;
use App\Http\Resources\InstructorsResource;

class InstructorsController extends Controller
{
    public function instructorregister(Request $request){
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:instructors'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'grandfathername' => ['string'],
            'gender' => ['string'],
            'level_of_study' => ['string'],
            'field_of_study' => ['string'],
            'address' => ['string'],
            'country' => ['string'],
            'city' => ['string'],
            'area_of_expertise' => ['string'],
            'description' => ['string'],
        ]);
        $instructor = Instructor::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'grandfathername' => $request->grandfathername,
            'gender' => $request->gender,
            'level_of_study' => $request->level_of_study,
            'field_of_study' => $request->field_of_study,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'area_of_expertise' => $request->area_of_expertise,
            'description' => $request->description,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        $instructor->users()->create();

        if($instructor){
            return response()->json([
                'data' => $instructor, 'status'=>true
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
        return new InstructorsResource($instructor);
    }

    public function index(){
       return InstructorsResource::collection(Instructor::all()); 
    }

    public function destroy(Instructor $instructor){
        $instructor->delete();
        return response(null, 204);
    }
}
