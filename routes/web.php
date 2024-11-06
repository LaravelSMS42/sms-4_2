<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamQuestionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AssignmentSubmissionController;

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
//Admin Routes
Route::get('/college/archives', [CollegeController::class, 'archive'])->name('archived-colleges');
Route::put('/college/archives/{college}', [CollegeController::class, 'unarchive'])->name('unarchive-college');
Route::get('/college/{college}/departments', [CollegeController::class, 'departments'])->name('college-depts');
Route::get('/college/{college}/programs', [CollegeController::class, 'programs'])->name('college-programs');
Route::resource('college', CollegeController::class);
Route::get('/department/archives', [DepartmentController::class, 'archive'])->name('archived-depts');
Route::put('/department/archives/{department}', [DepartmentController::class, 'unarchive'])->name('unarchive-dept');
Route::get('/department/{department}/programs', [DepartmentController::class, 'programs'])->name('department-programs');
Route::resource('department', DepartmentController::class);
Route::get('/program/archives', [ProgramController::class, 'archive'])->name('archived-programs');
Route::put('/program/archives/{program}', [ProgramController::class, 'unarchive'])->name('unarchive-program');
Route::resource('program', ProgramController::class);

//Instructor Routes - Will be rewritten after API of related entities has been accomplished
Route::resource('assignments', AssignmentController::class);
Route::get('/course/assignments/archives', [AssignmentController::class, 'archive'])->name('archived-assignments');
Route::put('/course/assignments/archives/{assignment}', [AssignmentController::class, 'unarchive'])->name('unarchive-assignment');
Route::resource('quizzes', QuizController::class);
Route::get('/course/quizzes/archives', [QuizController::class, 'archive'])->name('archived-quizzes');
Route::put('/course/quizzes/archives/{quiz}', [QuizController::class, 'unarchive'])->name('unarchive-quiz');
Route::resource('question', QuestionController::class);
Route::get('/instructor/{quiz}/questions', [QuestionController::class, 'questions'])->name('quiz-questions');
Route::get('/instructor/{quiz}/questions/add-question', [QuestionController::class, 'addQuestion'])->name('add-question');
Route::resource('exams', ExamController::class);
Route::get('/course/exams/archives', [ExamController::class, 'archive'])->name('archived-exams');
Route::put('/course/exams/archives/{exam}', [ExamController::class, 'unarchive'])->name('unarchive-exam');
Route::resource('exam-question', ExamQuestionController::class);
Route::get('/instructor/{exam}/exam-questions', [ExamQuestionController::class, 'questions'])->name('exam-questions');
Route::get('/instructor/{exam}/questions/add-exam-question', [ExamQuestionController::class, 'addQuestion'])->name('add-exam-question');
Route::get('/instructor/dashboard', function() {
    return view('instructor.dashboard');
});
Route::get('/instructor/course/menu', function() {
    return view('instructor.course-menu');
});

//Student Routes - Will be rewritten after API Accomplishment of related entities
Route::get('/student/dashboard', function() {
    return view('student.dashboard');
});
Route::get('/student/course/menu', function() {
    return view('student.course-menu');
});
Route::get('/student/course/assignments', [AssignmentController::class, 'studentIndex'])->name('student-assignment');
Route::resource('assignmentsubmission', AssignmentSubmissionController::class);
Route::get('/student/course/assignments/{assignment}/create', [AssignmentSubmissionController::class, 'createSubmission'])->name('create-assignment');

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


