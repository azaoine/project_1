<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StudentController::class, 'showStudent']);
Route::get('/student/pdf/{id}', [StudentController::class, 'createPDF']);
Route::get('/registration/pdf/{created_at}', [RegistrationController::class, 'createPDF']);


Route::resource('/student', StudentController::class)->middleware('auth');

Route::post('/student.filtrer', [StudentController::class, 'filtrer'])->name('/student.filtrer');
Route::post('/course.filtrer', [CoursesController::class, 'filtrer'])->name('/course.filtrer');
Route::post('/registration.filtrer', [RegistrationController::class, 'filtrer'])->name('/registration.filtrer');
Route::resource('/course', CoursesController::class)->middleware('auth');
Route::resource('/registration',RegistrationController::class)->middleware('auth');

Route::post('/course.search', function(){
    $query = request('query');
    $course= DB::table('courses')
        ->where('Courseid','like','%'.$query.'%')
        ->orWhere('CourseName','like','%'.$query.'%')
        ->orWhere('Duration', 'like', '%'.$query.'%') 
        ->orWhere('Fees', 'like', '%'.$query.'%')
        ->get();
    return view('/course.search')->with('courses', $course);
    });
       
    Route::post('/student.search', function(){
    $stud = request('query');
    $student= DB::table('students')
        ->where('Studid','like','%'.$stud.'%')
        ->orWhere('FirstName','like','%'.$stud.'%')
        ->orWhere('LastName', 'like', '%'.$stud.'%') 
        ->orWhere('Street', 'like', '%'.$stud.'%')
        ->orWhere('City', 'like', '%'.$stud.'%')
        ->orWhere('DOB', 'like', '%'.$stud.'%')
        ->get();
    return view('/student.search')->with('students', $student);
    });

 Route::post('/student-course.search', function(){
    
    $query = request('query');
    $student= DB::table('students')
        ->where('Studid','like','%'.$query.'%')
        ->orWhere('FirstName','like','%'.$query.'%')
        ->orWhere('LastName', 'like', '%'.$query.'%') 
        ->orWhere('Street', 'like', '%'.$query.'%')
        ->orWhere('City', 'like', '%'.$query.'%')
        ->orWhere('DOB', 'like', '%'.$query.'%')
        ->get();
    $course= DB::table('courses')
        ->where('Courseid','like','%'.$query.'%')
        ->orWhere('CourseName','like','%'.$query.'%')
        ->orWhere('Duration', 'like', '%'.$query.'%') 
        ->orWhere('Fees', 'like', '%'.$query.'%')
        ->get();
         
    return view('search')
        ->with('students', $student)
        ->with('courses', $course);

    });
 
 Route::get('/student-course.search', function(){

    return('Ce programme ne supporte pas la methode Get');
 });

Route::resource('/dashboard', DashboardController::class);


Route::view('/bootstrap','bootstrap.first');
Route::view('/layouts','layouts.my_layoute');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
