<?php
use App\Http\Controllers\CoursesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\PasswordResetController;


Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class,'register']);

Route::group(['middleware'=>'api'],function(){
    Route::post('logout', [UserController::class,'logout']);
    Route::post('refresh', [UserController::class,'refresh']);
    Route::post('me', [UserController::class,'me']);
});
Route::get('/courses/{course}', [CoursesController::class, 'show']);

Route::apiResource('/students', StudentsController::class);
Route::apiResource('/instructors', StudentsController::class);
Route::apiResource('/courses', CoursesController::class);
Route::apiResource('/modules', ModulesController::class);