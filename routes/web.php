<?php

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', 'HomeController@index')->name('home');

// User
Route::match(['get', 'post'], '/user/login', 'UserController@login')->name('login');
Route::get('/user/logout', 'UserController@logout')->name('logout');

// Dashboard
Route::match(['get', 'post'], '/dashboard', 'DashboardController@index')->name('dashboard.index');

// Administrator
Route::get('/administrator', 'AdminController@index')->name('admin.index');
Route::match(['get', 'post'], '/administrator/create', 'AdminController@create')->name('admin.create');
Route::match(['get', 'post'], '/administrator/edit', 'AdminController@edit')->name('admin.edit');  
Route::get ('/administrator/delete', 'AdminController@delete')->name('admin.delete');

// Student
Route::get ('/student', 'StudentController@index')->name('student.index');
Route::match(['get', 'post'], '/student/signup', 'StudentController@signup')->name('student.signup');
Route::match(['get', 'post'], '/student/create', 'StudentController@create')->name('student.create');
Route::match(['get', 'post'], '/student/edit', 'StudentController@edit')->name('student.edit');
Route::get ('/student/delete', 'StudentController@delete')->name('student.delete');

// Course
Route::get ('/course', 'CourseController@index')->name('course.index');
Route::match(['get', 'post'], '/course/create', 'CourseController@create')->name('course.create');
Route::match(['get', 'post'], '/course/edit', 'CourseController@edit')->name('course.edit');
Route::get ('/course/delete', 'CourseController@delete')->name('course.delete');

// Subject
Route::get ('/subject', 'SubjectController@index')->name('subject.index');
Route::match(['get', 'post'], '/subject/create', 'SubjectController@create')->name('subject.create');
Route::match(['get', 'post'], '/subject/edit', 'SubjectController@edit')->name('subject.edit');
Route::get ('/subject/delete', 'SubjectController@delete')->name('subject.delete');

// Record
Route::get ('/record', 'RecordController@index')->name('record.index');

// Teacher
Route::get ('/teacher', 'TeacherController@index')->name('teacher.index');
Route::match(['get', 'post'], '/teacher/create', 'TeacherController@create')->name('teacher.create');
Route::match(['get', 'post'], '/teacher/edit', 'TeacherController@edit')->name('teacher.edit');
Route::get ('/teacher/delete', 'TeacherController@delete')->name('teacher.delete');

// Branch
Route::get ('/branch', 'BranchController@index')->name('branch.index');
Route::match(['get', 'post'], '/branch/create', 'BranchController@create')->name('branch.create');
Route::match(['get', 'post'], '/branch/edit', 'BranchController@edit')->name('branch.edit');
Route::get ('/branch/delete', 'BranchController@delete')->name('branch.delete');

// Schedule
Route::get ('/schedule', 'ScheduleController@index')->name('schedule.index');
Route::match(['get', 'post'], '/schedule/create', 'ScheduleController@create')->name('schedule.create');
