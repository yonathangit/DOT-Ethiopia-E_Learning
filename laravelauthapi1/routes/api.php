<?php
use App\Http\Controllers\CoursesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\PasswordResetController;


Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class,'studentRegister']);

Route::group(['middleware'=>'api'],function(){
    Route::post('logout', [UserController::class,'logout']);
    Route::post('refresh', [UserController::class,'refresh']);
    Route::post('me', [UserController::class,'me']);
});
Route::get('/courses/{course}', [CoursesController::class, 'show']);
Route::post('enroll/{course}', [EnrollmentController::class, 'store']);
Route::apiResource('/students', StudentsController::class);
Route::apiResource('/instructors', StudentsController::class);
Route::apiResource('/courses', CoursesController::class);
Route::apiResource('/modules', ModulesController::class);

Route::post('adminregister', [AdminController::class, 'adminregister'])->name('adminregister');
Route::post('adminlog', [AdminController::class, 'adminlog'])->name('adminlog');
Route::post('studentregister', [StudentsController::class, 'studentregister'])->name('studentregister');
Route::post('studentlog', [StudentsController::class, 'studentlog'])->name('studentlog');
Route::post('instructorregister', [InstructorsController::class, 'instructorregister'])->name('instructorregister');
Route::post('instructorlog', [InstructorsController::class, 'instructorlog'])->name('instructorlog');


Route::group([

    'middleware' => 'auth:student-api',
    

], function () {
   
    Route::post('studentlogout', [StudentsController::class, 'studentlogout'])->name('studentlogout');
    Route::post('studme', [StudentsController::class, 'me']);

});

Route::group([

    'middleware' => 'auth:admin-api',
    

], function () {
   
    Route::post('adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');
    Route::post('adminme', [AdminController::class, 'me']);

});

Route::group([

    'middleware' => 'auth:instructor-api',
    

], function () {
   
    Route::post('instructorlogout', [InstructorsController::class, 'instructorlogout'])->name('instructorlogout');
    Route::post('instructorme', [InstructorsController::class, 'me']);

});