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

//HomeControllers, login y dashboard
Route::get('/', 'IndexController@index')->name('home');;

Route::match(['get', 'post'], '/user/login', 'UserController@login')->name('login');;

Route::get('/user/register', 'StudentController@signup')->name('register');

Route::match(['get', 'post'], 'dashboard', 'DashboardController@index')->name('dashboard');

//adminControllers

Route::get('admins', 'AdminController@index')->name('adminIndex');
Route::match(['get', 'post'], 'admins/create', 'AdminController@create')->name('adminCreate');
Route::match(['get', 'post'], 'admins/edit', 'AdminController@edit')->name('adminProfile');  
Route::get ('admins/delete', 'AdminController@delete')->name('adminDelete');

//studentControllers
Route::get ('students', 'StudentController@index')->name('studentIndex');
Route::match(['get', 'post'], 'students/create', 'StudentController@create')->name('studentCreate');
Route::match(['get', 'post'], 'students/edit', 'StudentController@edit')->name('studentProfile');
Route::get ('students/delete', 'StudentController@delete')->name('studentDelete');

//courseControllers

Route::get ('courses', 'CourseController@index')->name('courses');
Route::match(['get', 'post'], 'courses/create', 'CourseController@create')->name('courseCreate');
Route::match(['get', 'post'], 'courses/edit', 'CourseController@edit')->name('courseProfile');
Route::get ('courses/delete', 'CourseController@delete')->name('courseDelete');

//subjectControllers

Route::get ('subjects', 'SubjectController@index')->name('classes');
Route::match(['get', 'post'], 'subjects/create', 'SubjectController@create')->name('subjectCreate');
Route::match(['get', 'post'], 'subjects/edit', 'SubjectController@edit')->name('subjectProfile');
Route::get ('subjects/delete', 'SubjectController@delete')->name('subjectDelete');


//teacherControllers

Route::get ('teachers', 'TeacherController@index')->name('teachers');

//branchesControllers

Route::get ('branches', 'BranchController@index')->name('branches');

//schedulesControllers

Route::get ('schedules', 'ScheduleController@index')->name('schedules');
Route::match(['get', 'post'], 'schedules/create', 'ScheduleController@create')->name('schedulesCreate');














//Route::get('/schedule', 'ScheduleController@index');

//Route::get('/student', 'StudentController@signup');

//Route::get('/user', 'UserController@login');



