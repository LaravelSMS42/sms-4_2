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


#Group 3 Routes

#Task 12
Route::get('/EventCategories', function () {
    return view('DTR.EventCategories');
});

Route::get('/EventRegistration', function () {
    return view('DTR.EventRegistration');
});

Route::get('/CreateEvent', function () {
    return view('DTR.CreateEvent');
});

Route::get('/VenueManagement', function () {
    return view('DTR.VenueManagement');
});

Route::get('/ResourceAllocation', function () {
    return view('DTR.ResourceAllocation');
});


