<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return redirect('/hello');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/college/archives', [CollegeController::class, 'archive'])->name('archived-colleges');
Route::put('/college/archives/{college}', [CollegeController::class, 'unarchive'])->name('unarchive-college');
Route::get('/college/{college}/departments', [CollegeController::class, 'departments'])->name('college-depts');
Route::resource('college', CollegeController::class);
Route::get('/department/archives', [DepartmentController::class, 'archive'])->name('archived-depts');
Route::put('/department/archives/{department}', [DepartmentController::class, 'unarchive'])->name('unarchive-dept');
Route::resource('department', DepartmentController::class);

// Route::get('/college', [CollegeController::class, 'index'])->name('college');

// Route::get('/add-college',[CollegeController::class, 'create'])->name('add-college');

// //Edit to '/edit-college/{collegeID}' when backend is functional
// Route::get('/edit-college', function () {
//     return view('admin.edit-college');
// });

// //Edit to '/{collegeID}/departments' when backend is functional
// Route::get('/department', function () {
//     return view('admin.department');
// });

// Route::get('/add-department', function () {
//     return view('admin.add-department');
// });

// //Edit to '/{collegeID}/departments/edit-department/{departmentID}' when backend is functional
// Route::get('/department/edit-department', function () {
//     return view('admin.edit-department');
// });

// //Edit to '/{collegeID}/{departmentID}/programs' when backend is functional
// Route::get('college/department/programs', function () {
//     return view('admin.dept-programs');
// });

// //Edit to '/{collegeID}/programs' when backend is functional
// Route::get('college/programs', function () {
//     return view('admin.college-programs');
// });

// Route::get('/add-program', function () {
//     return view('admin.add-program');
// });

// //Add to '/edit-program/{programID}' when backend is functional
// Route::get('/edit-program', function () {
//     return view('admin.edit-program');
// });

// //Add to '/college/{collegeID}/archive' when backend is functional
// Route::get('/archive-college', function () {
//     return view('admin.archive-college');
// });

// //Add to '/college/{departmentID}/archive' when backend is functional
// Route::get('/archive-department', function () {
//     return view('admin.archive-department');
// });

// //Add to '/college/{programID}/archive' when backend is functional
// Route::get('/archive-program', function () {
//     return view('admin.archive-program');
// });

// //Edit to '/departments' when backend is functional
// Route::get('/all-departments', function () {
//     return view('admin.all-depts');
// });

// //Edit to '/programs' when backend is functional
// Route::get('/all-programs', function () {
//     return view('admin.all-programs');
// });

// Route::get('/college-archives', function () {
//     return view('admin.college-archives');
// });

// Route::get('/dept-archives', function () {
//     return view('admin.dept-archives');
// });

// Route::get('/program-archives', function () {
//     return view('admin.program-archives');
// });