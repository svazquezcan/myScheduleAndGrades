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

// Home, login y dashboard
Route::get('/', 'IndexController@index')->name('home');;
Route::match(['get', 'post'], '/user/login', 'UserController@login')->name('login');;
Route::get('/user/register', 'StudentController@signup')->name('register');
Route::match(['get', 'post'], 'dashboard', 'DashboardController@index')->name('dashboard');

// Admin
Route::get('admins', 'AdminController@index')->name('adminIndex');
Route::match(['get', 'post'], 'admins/create', 'AdminController@create')->name('adminCreate');
Route::match(['get', 'post'], 'admins/edit', 'AdminController@edit')->name('adminProfile');  
Route::get ('admins/delete', 'AdminController@delete')->name('adminDelete');

// Student
Route::get ('students', 'StudentController@index')->name('studentIndex');
Route::match(['get', 'post'], 'students/create', 'StudentController@create')->name('studentCreate');
Route::match(['get', 'post'], 'students/edit', 'StudentController@edit')->name('studentProfile');
Route::get ('students/delete', 'StudentController@delete')->name('studentDelete');

// Course
Route::get ('courses', 'CourseController@index')->name('courses');
Route::match(['get', 'post'], 'courses/create', 'CourseController@create')->name('courseCreate');
Route::match(['get', 'post'], 'courses/edit', 'CourseController@edit')->name('courseProfile');
Route::get ('courses/delete', 'CourseController@delete')->name('courseDelete');

// Subject
Route::get ('subjects', 'SubjectController@index')->name('classes');
Route::match(['get', 'post'], 'subjects/create', 'SubjectController@create')->name('subjectCreate');
Route::match(['get', 'post'], 'subjects/edit', 'SubjectController@edit')->name('subjectProfile');
Route::get ('subjects/delete', 'SubjectController@delete')->name('subjectDelete');

// Teacher
Route::get ('teachers', 'TeacherController@index')->name('teachers');
Route::match(['get', 'post'], 'teachers/create', 'TeacherController@create')->name('teacherCreate');
Route::match(['get', 'post'], 'teachers/edit', 'TeacherController@edit')->name('teacherProfile');
Route::get ('teachers/delete', 'TeacherController@delete')->name('teacherDelete');

// Branch
Route::get ('branches', 'BranchController@index')->name('branches');
Route::match(['get', 'post'], 'branches/create', 'BranchController@create')->name('branchCreate');
Route::match(['get', 'post'], 'branches/edit', 'BranchController@edit')->name('branchProfile');
Route::get ('branches/delete', 'BranchController@delete')->name('branchDelete');

// Schedule
Route::get ('schedules', 'ScheduleController@index')->name('schedules');
Route::match(['get', 'post'], 'schedules/create', 'ScheduleController@create')->name('schedulesCreate');
