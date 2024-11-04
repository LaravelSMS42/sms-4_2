<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use App\Models\College;
use App\Models\Building;

class QuestionController extends Controller
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

        Question::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'points' => $request->points,
            'task_id' => $request->task_id,
        ]);
        return redirect()->route('quiz-questions', $request->task_id)->with('status', 'Question added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
        return view('instructor.questions.edit-question', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //

        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'points' => 'required|between:0,100.00'
        ]);

        $question->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'points' => $request->points,
            'task_id' => $request->task_id,
        ]);
        return redirect()->route('quiz-questions', $question->task_id)->with('status', 'Question updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
        $id = $question->task_id;
        $question->delete();
        return redirect()->route('quiz-questions', $id)->with('status', 'Question deleted successfully!');
    }

    public function questions(Quiz $quiz)
    {
        $questions = DB::table('questions')->where('task_id', '=', $quiz->id)->get();
        return view('instructor.questions.questions', compact('quiz'))->with('questions', $questions);
    }

    public function addQuestion(Quiz $quiz)
    {
        return view('instructor.questions.add-question', compact('quiz'));
    }
}
