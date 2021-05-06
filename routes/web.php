<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('index/index');
});
*/

Route::get('/', 'IndexController@index')->name('home');;

Route::match(['get', 'post'], '/user/login', 'UserController@login')->name('login');;

Route::get('/user/register', 'StudentController@signup')->name('register');

Route::match(['get', 'post'], 'dashboard', 'DashboardController@index')->name('dashboard');

Route::get('admins', 'AdminController@index')->name('adminIndex');

Route::get ('students', 'StudentController@index')->name('studentIndex');

Route::get ('courses', 'CourseController@index')->name('courses');

Route::get ('subjects', 'SubjectController@index')->name('classes');

Route::get ('teachers', 'TeacherController@index')->name('teachers');

Route::get ('branches', 'BranchController@index')->name('branches');

Route::get ('schedules', 'ScheduleController@index')->name('schedules');

Route::get ('admin/edit', 'AdminController@edit')->name('adminProfile');  //falta pasar parámetro id para el edit

Route::get ('student/edit', 'StudentController@edit')->name('studentProfile');

Route::get ('schedules/create', 'ScheduleController@create')->name('schedulesCreate');













//Route::get('/schedule', 'ScheduleController@index');

//Route::get('/student', 'StudentController@signup');

//Route::get('/user', 'UserController@login');



