<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;

// Web Routes
Route::get('/', function () {
    return redirect('/hello');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/college', function () {
    return view('admin.college');
});

Route::get('/payroll/create', [PayrollController::class, 'create'])->name('payroll.create'); // Show create form
Route::get('/payroll/approval', [PayrollController::class, 'showApprovalPage'])->name('payroll.approval'); // Show approval page
Route::get('/payroll/history', [PayrollController::class, 'showHistoryPage'])->name('payroll.history'); // Show history page