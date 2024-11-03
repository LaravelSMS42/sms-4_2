<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $quizzes = DB::table('quizzes')->where('archived', '=', 0)->get();
        return view('instructor.quizzes.quizzes')->with('quizzes', $quizzes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('instructor.quizzes.add-quiz');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'instructions' => 'required|string',
            'points' => 'required|between:0,100.00',
            'deadline_date' => 'required|after_or_equal:' . date(DATE_ATOM),
            'available_date' => 'required|after_or_equal:' . date(DATE_ATOM),
            'allow_attachments' => 'nullable'
        ]);

        Quiz::create([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'points' => $request->points,
            'deadline_date' => $request->deadline_date,
            'available_date' => $request->available_date,
            'allow_attachments' => $request->allow_attachments == true ? 1:0,
        ]);
        return redirect()->route('quizzes.index')->with('status', 'Quiz added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
        return view('instructor.quizzes.edit-quiz', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'instructions' => 'required|string',
            'points' => 'required|between:0,100.00',
            'deadline_date' => 'required|after_or_equal:' . date(DATE_ATOM),
            'available_date' => 'required|after_or_equal:' . date(DATE_ATOM),
            'allow_attachments' => 'nullable'
        ]);

        $quiz->update([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'points' => $request->points,
            'deadline_date' => $request->deadline_date,
            'available_date' => $request->available_date,
            'allow_attachments' => $request->allow_attachments == true ? 1:0,
        ]);
        return redirect()->route('quizzes.index')->with('status', 'Quiz updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
        $quiz->update([
            'archived' => 1
        ]);
        return redirect()->route('quizzes.index')->with('status', 'Quiz archived successfully!');
    }

    public function archive()
    {
        //
        $quizzes = DB::table('quizzes')->where('archived', '=', 1)->get();
        return view('instructor.quizzes.quiz-archives')->with('quizzes', $quizzes);
    }

    public function unarchive(Quiz $quiz)
    {
        //
        $quiz->update([
            'archived' => 0
        ]);
        return redirect()->route('archived-quizzes')->with('status', 'Quiz restored successfully!');
    }

}
