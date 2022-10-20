<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\PasswordResetController;


Route::middleware(['auth:sanctum'])->get('/user',function(Request $request){
    
    Route::get('/loggeduser', [UserController::class, 'logged_user']);
    Route::post('/changepassword', [UserController::class, 'change_password']);
});
// Public Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Protected Routes
Route::group(['middlwware'=>['auth:sanctum']], function(){
    Route::resource('/task', TasksController::class);
    Route::post('/logout', [UserController::class, 'logout']);
});


