<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

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

# Group 1
Route::resource('rooms', RoomController::class);
Route::get('/scheduling', [RoomController::class, 'scheduling'])->name('scheduling.index');
Route::post('/scheduling', [RoomController::class, 'schedule'])->name('scheduling.store');
Route::get('/availability', [RoomController::class, 'availability'])->name('availability.index');
Route::post('/availability', [RoomController::class, 'updateAvailability'])->name('availability.update');