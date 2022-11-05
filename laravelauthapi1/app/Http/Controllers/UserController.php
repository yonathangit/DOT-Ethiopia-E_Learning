<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentsRequest;
use App\Http\Resources\StudentsResource;


class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','studentRegister']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */



    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }




    public function update (StudentsRequest $request, User $user){
        $user->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => $request->input('password')  
        ]);
       
        return new StudentsResource($user);
    }




    public function destroy(User $user){
        $user->delete();
        return response("Deleted", 204);
    }
    public function show(User $user){
        return new StudentsResource($user);
    }




    public function index(){
          $students = DB::table('users')
                         ->join('students', 'users.id', '=', 'students.user_id')
                         ->select('users.*')
                         ->get();
          
          response()->json([
            $students->toArray()
          ]);

    }


    public function studentRegister(Request $request)
    {
        $student = Student::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
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

    public function instructorRegister(Request $request)
    {
        // $instructor = Student::create([
        //     'firstname' => $request->firstname,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'password' =>  Hash::make($request->password),
        // ]);

        // $student->users()->create();

        // if($student){
        //     return response()->json([
        //         $student, 'status'=>true
        //     ]);  
        // }else{
        //     return response()->json(['status'=>false]);
        // }
    }



    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}