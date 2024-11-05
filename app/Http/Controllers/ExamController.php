<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $exams = DB::table('exams')->where('archived', '=', 0)->get();
        return view('instructor.exams.exams')->with('exams', $exams);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('instructor.exams.add-exam');
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

        Exam::create([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'points' => $request->points,
            'deadline_date' => $request->deadline_date,
            'available_date' => $request->available_date,
            'allow_attachments' => $request->allow_attachments == true ? 1:0,
        ]);
        return redirect()->route('exams.index')->with('status', 'Exam added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
        return view('instructor.exams.edit-exam', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
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

        $exam->update([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'points' => $request->points,
            'deadline_date' => $request->deadline_date,
            'available_date' => $request->available_date,
            'allow_attachments' => $request->allow_attachments == true ? 1:0,
        ]);
        return redirect()->route('exams.index')->with('status', 'Exam updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
        $exam->update([
            'archived' => 1
        ]);
        return redirect()->route('exams.index')->with('status', 'Exam archived successfully!');
    }
    public function archive()
    {
        //
        $exams = DB::table('exams')->where('archived', '=', 1)->get();
        return view('instructor.exams.exam-archives')->with('exams', $exams);
    }

    public function unarchive(Exam $exam)
    {
        //
        $exam->update([
            'archived' => 0
        ]);
        return redirect()->route('archived-exams')->with('status', 'Exam restored successfully!');
    }
}
