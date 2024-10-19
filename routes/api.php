<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/payroll/store', [PayrollController::class, 'store'])->name('payroll.store'); // Store payroll via API
Route::get('/payroll/pending', [PayrollController::class, 'getPendingPayrolls'])->name('payroll.pending'); // Get pending payrolls
Route::get('/payroll/history', [PayrollController::class, 'getPayrollHistory'])->name('payroll.history'); // Get payroll history
Route::post('/payroll/approve/{id}', [PayrollController::class, 'approveApi'])->name('payroll.approve.api'); // Approve payroll
Route::delete('/payroll/decline/{id}', [PayrollController::class, 'declineApi'])->name('payroll.decline.api'); // Decline payroll