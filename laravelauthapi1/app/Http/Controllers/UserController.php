<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
<<<<<<< HEAD
   
    public function register(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'tc'=>'required',
        ]);
=======
    public function register(StoreUserRequest $request){
        $request->validated($request->all());
>>>>>>> ba2a9a571c11f5b8b536f0a0a32be86772368c96
        if(User::where('email', $request->email)->first()){
            return response([
                'message' => 'Email already exists',
                'status'=>'failed'
            ], 200);
        }

        $user = User::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
<<<<<<< HEAD
=======
            'address'=> $request->address,
            'date_of_birth'=>$request->date_of_birth,
            'gender'=> $request->gender,
            'field_of_study'=> $request->field_of_study,
            'level-of_study'=> $request->level_of_study,
            'phone_number'=> $request->phone_number,
>>>>>>> ba2a9a571c11f5b8b536f0a0a32be86772368c96
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'tc'=>json_decode($request->tc),
        ]);
        $token = $user->createToken('api Token for' . $user->email)->plainTextToken;
        return response([
            'token'=>$token,
            'message' => 'Registration Success',
            'status'=>'success'
        ], 201);
    }

    public function login(LoginUserRequest $request){
        $request->validate($request->all());
        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken('api for login in ' . $user->email)->plainTextToken;
            $cookie = cookie('loginjwt', $token, 60*24);
            return response([
                'message' => 'Login Success',
                'status'=>'success'
            ], 200)->withCookie($cookie);
        }
        return response([
            'message' => 'The Provided Credentials are incorrect',
            'status'=>'failed'
        ], 401);
    }

    public function logout(){
<<<<<<< HEAD
        return response([
            'message' => 'Logout Success',
            'status'=>'success'
        ], 200);
=======
        $cookie = Cookie::forget('loginjwt');
>>>>>>> ba2a9a571c11f5b8b536f0a0a32be86772368c96
    }
    
    public function logged_user(){
        $loggeduser = auth()->user();
        return response([
            'user'=>$loggeduser,
            'message' => 'Logged User Data',
            'status'=>'success'
        ], 200);
    }

    public function change_password(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $loggeduser = auth()->user();
        $loggeduser->password = Hash::make($request->password);
        return response([
            'message' => 'Password Changed Successfully',
            'status'=>'success'
        ], 200);
    }
}
