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

