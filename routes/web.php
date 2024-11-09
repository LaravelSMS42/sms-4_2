<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RoomController;

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
Route::get('employee/{employee_id}/salary', [EmployeeController::class, 'showSalary'])->name('employee.salary');

Route::get('/employee/{id}/attendance', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
Route::post('/employee/{id}/freeze', [EmployeeController::class, 'freeze'])->name('employee.freeze');
Route::post('/employee/{id}/unfreeze', [EmployeeController::class, 'unfreeze'])->name('employee.unfreeze');
Route::get('/payroll/deleted', [PayrollController::class, 'showDeleted'])->name('payroll.deleted');
Route::post('/payroll/restore/{id}', [PayrollController::class, 'restore'])->name('payroll.restore');
Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');

Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create'); // Show create room form
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store'); // Store new room
Route::get('/rooms', [RoomController::class, 'show'])->name('rooms.show'); // List all rooms
Route::delete('/rooms/{id}', [RoomController::class, 'remove'])->name('rooms.remove'); //Delete Rooms
Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update'); // Update room


Route::post('/rooms/{room}/book', [RoomController::class, 'book'])->name('rooms.book');
Route::post('/rooms/{id}/book', [RoomController::class, 'book'])->name('rooms.book');
Route::get('/rooms/booked', [RoomController::class, 'booked'])->name('rooms.booked');
Route::delete('/bookings/{id}', [RoomController::class, 'destroy'])->name('bookings.destroy');
Route::put('/bookings/{id}', [RoomController::class, 'updateBooking'])->name('bookings.update');


Route::get('/attendance/{employeeId}/dates', [EmployeeController::class, 'getAttendanceDates']);
Route::post('/attendance/remove', [EmployeeController::class, 'remove'])->name('attendance.remove');