<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;

// Payroll API resource with additional custom routes
Route::apiResource('payroll', PayrollController::class)->only([
    'store', 'index', 'show'
]);
Route::post('/payroll', [PayrollController::class, 'store'])->name('payroll.store'); // Store payroll

Route::get('/payroll/pending', [PayrollController::class, 'getPendingPayrolls'])->name('payroll.pending');
Route::get('/payroll/history', [PayrollController::class, 'getPayrollHistory'])->name('payroll.history');
Route::post('/payroll/approve/{id}', [PayrollController::class, 'approveApi'])->name('payroll.approve.api');
Route::delete('/payroll/decline/{id}', [PayrollController::class, 'declineApi'])->name('payroll.decline.api');

// Other resources
Route::apiResource('colleges', CollegeController::class);
Route::apiResource('buildings', BuildingController::class);
Route::apiResource('departments', DepartmentController::class);
Route::apiResource('programs', ProgramController::class);
