<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/hello');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/college', function () {
    return view('admin.college');
});

Route::get('/add-college', function () {
    return view('admin.add-college');
});

//Edit to '/edit-college/{collegeID}' when backend is functional
Route::get('/edit-college', function () {
    return view('admin.edit-college');
});

//Edit to '/{collegeID}/departments' when backend is functional
Route::get('/department', function () {
    return view('admin.department');
});

Route::get('/add-department', function () {
    return view('admin.add-department');
});

//Edit to '/{collegeID}/departments/edit-department/{departmentID}' when backend is functional
Route::get('/department/edit-department', function () {
    return view('admin.edit-department');
});

//Edit to '/{collegeID}/{departmentID}/programs' when backend is functional
Route::get('college/department/programs', function () {
    return view('admin.dept-programs');
});

//Edit to '/{collegeID}/programs' when backend is functional
Route::get('college/programs', function () {
    return view('admin.college-programs');
});

Route::get('/add-program', function () {
    return view('admin.add-program');
});

//Add to '/edit-program/{programID}' when backend is functional
Route::get('/edit-program', function () {
    return view('admin.edit-program');
});

//Add to '/college/{collegeID}/archive' when backend is functional
Route::get('/archive-college', function () {
    return view('admin.archive-college');
});

//Add to '/college/{departmentID}/archive' when backend is functional
Route::get('/archive-department', function () {
    return view('admin.archive-department');
});

//Add to '/college/{programID}/archive' when backend is functional
Route::get('/archive-program', function () {
    return view('admin.archive-program');
});