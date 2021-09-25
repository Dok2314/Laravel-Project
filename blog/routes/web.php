<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegistrationController;

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

Route::get('/',[MainController::class,'mainView'])->name('home');


Route::name('user.')->group(function(){
    Route::view('/admin','authenticate.admin')->middleware('auth')->name('admin');
    Route::get('/login',function(){
        if(Auth::check()){
            return redirect(route('user.admin'));
        }
        return view('authenticate.login');
    })->name('login');
    Route::get('/registration',function(){
        if(Auth::check()){
            return redirect(route('user.admin'));
        }
        return view('authenticate.registration');
    })->name('registration');
    Route::get('/logout',function(){
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');
    Route::post('/login',[LoginController::class,'login']);
    Route::post('/registration',[RegistrationController::class,'registration']);
});

Route::get('/create/teacher',[TeacherController::class,'createTeacherView'])->name('createTeacher');
Route::post('/create/teacher',[TeacherController::class,'createTeacher']);

Route::get('/create/subject',[SubjectController::class,'createSubjectView'])->name('createSubject');
Route::post('/create/subject',[SubjectController::class,'createSubject']);

Route::get('/all/teachers',[TeacherController::class,'allTeacherView'])->name('allTeacher');

Route::get('/find/teacher/{id}',[TeacherController::class,'findTeacherView'])->name('findTeacher');
Route::post('/find/teacher/{id}',[TeacherController::class,'findTeacherView']);

Route::get('/delete/teacher/{id}',[TeacherController::class,'deleteTeacher'])->name('delete');

Route::get('/new/question',[QuestionController::class,'createView'])->name('newQuestion');
Route::post('/new/question',[QuestionController::class, 'createQuestion']);

Route::get('/create/answer',[AnswerController::class,'createView'])->name('viewAnswer');
Route::post('/create/answer',[AnswerController::class,'createAnswer']);

Route::get('/test/{id}',[TestController::class,'test'])->name('test');
Route::post('/test/{id}',[TestController::class,'test']);

Route::get('/ajax',[PostController::class,'index'])->name('index');
Route::post('/post/store/',[PostController::class,'storeData']);


Route::get('/posts/all',[PostController::class,'allData']);

Route::get('/posts/edit/{id}',[PostController::class,'editData']);

Route::post('/posts/update/{id}',[PostController::class,'updateData']);

Route::get('/posts/delete/{id}',[PostController::class,'deleteData']);