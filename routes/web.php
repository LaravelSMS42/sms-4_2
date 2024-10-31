<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index'); // List all employees
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create'); // Show create employee form
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store'); // Store new employee
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show'); // Show specific employee details
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::get('/payroll/get-employee-name/{id}', [PayrollController::class, 'getEmployeeName']);