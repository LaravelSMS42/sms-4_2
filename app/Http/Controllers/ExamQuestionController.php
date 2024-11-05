<?php

namespace App\Http\Controllers;

use App\Models\ExamQuestion;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'points' => 'required|between:0,100.00'
        ]);

        ExamQuestion::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'points' => $request->points,
            'task_id' => $request->task_id,
        ]);
        // $question = ExamQuestion::create([
        //     'question' => $request->question,
        //     'answer' => $request->answer,
        //     'points' => $request->points,
        //     'task_id' => $request->task_id,
        // ]);
        //return $question;
        return redirect()->route('exam-questions', $request->task_id)->with('status', 'Question added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamQuestion $examQuestion)
    {
        //
        return view('instructor.questions.edit-exam-question', compact('examQuestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamQuestion $examQuestion)
    {
        //
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'points' => 'required|between:0,100.00'
        ]);

        $examQuestion->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'points' => $request->points,
            'task_id' => $request->task_id,
        ]);
        return redirect()->route('exam-questions', $examQuestion->task_id)->with('status', 'Question updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamQuestion $examQuestion)
    {
        //
        $id = $examQuestion->task_id;
        $examQuestion->delete();
        return redirect()->route('exam-questions', $id)->with('status', 'Question deleted successfully!');
    }

    public function questions(Exam $exam)
    {
        $examQuestions = DB::table('exam_questions')->where('task_id', '=', $exam->id)->get();
        return view('instructor.questions.exam-questions', compact('exam'))->with('examQuestions', $examQuestions);
    }

    public function addQuestion(Exam $exam)
    {
        return view('instructor.questions.add-exam-question', compact('exam'));
    }
}
