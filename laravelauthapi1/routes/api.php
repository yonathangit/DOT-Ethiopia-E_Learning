<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\InstuctorsController;
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
Route::middleware(['auth:sanctum'])->group(function(){
     Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/loggeduser', [UserController::class, 'logged_user']);
    Route::post('/changepassword', [UserController::class, 'change_password']);
    
});
Route::get('/courses/{course}', [CoursesController::class, 'show']);

Route::apiResource('/students', StudentsController::class);
Route::apiResource('/courses', CoursesController::class);
Route::apiResource('/modules', ModulesController::class);

    Route::post('/logout', [UserController::class, 'logout']);
   Route::get('/loggeduser', [UserController::class, 'logged_user']);
   Route::post('/changepassword', [UserController::class, 'change_password']);
   

Route::get('/instructors/{instructor}', [CoursesController::class, 'show']);




