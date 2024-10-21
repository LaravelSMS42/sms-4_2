<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('colleges', CollegeController::class);
Route::apiResource('buildings', BuildingController::class);
Route::apiResource('departments', DepartmentController::class);
Route::apiResource('programs', ProgramController::class);