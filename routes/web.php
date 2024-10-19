<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;

Route::get('/', function () {
    return redirect('/hello');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/college', function () {
    return view('admin.college');
});

Route::get('/payroll/create', [PayrollController::class, 'create'])->name('payroll.create');
Route::post('/payroll/store', [PayrollController::class, 'store'])->name('payroll.store');
Route::get('/payroll/history', [PayrollController::class, 'history'])->name('payroll.history');
Route::get('/payroll/approval', [PayrollController::class, 'approval'])->name('payroll.approval');
Route::post('/payroll/approve/{id}', [PayrollController::class, 'approve'])->name('payroll.approve');
Route::post('/payroll/decline/{id}', [PayrollController::class, 'decline'])->name('payroll.decline');
Route::get('/test', function () {
    return 'Test route is working!';
});
