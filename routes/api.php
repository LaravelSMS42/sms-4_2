<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamQuestionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AssignmentSubmissionController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('colleges', CollegeController::class);
Route::apiResource('buildings', BuildingController::class);
Route::apiResource('departments', DepartmentController::class);
Route::apiResource('programs', ProgramController::class);
Route::apiResource('assignments', AssignmentController::class);
Route::apiResource('quizzes', QuizController::class);
Route::apiResource('questions', QuestionController::class);
Route::apiResource('exam-questions', ExamQuestionController::class);
Route::apiResource('exams', ExamController::class);
Route::apiResource('assignmentsubmissions', AssignmentSubmissionController::class);