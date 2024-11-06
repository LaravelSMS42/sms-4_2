<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $assignments = DB::table('assignments')->where('archived', '=', 0)->get();
        return view('instructor.assignments.assignments')->with('assignments', $assignments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('instructor.assignments.add-assignment');
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

        Assignment::create([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'points' => $request->points,
            'deadline_date' => $request->deadline_date,
            'available_date' => $request->available_date,
            'allow_attachments' => $request->allow_attachments == true ? 1:0,
        ]);
        return redirect()->route('assignments.index')->with('status', 'Assignment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        //
        return view('student.assignments.assignment', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        //
        return view('instructor.assignments.edit-assignment', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
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

        $assignment->update([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'points' => $request->points,
            'deadline_date' => $request->deadline_date,
            'available_date' => $request->available_date,
            'allow_attachments' => $request->allow_attachments == true ? 1:0,
        ]);
        return redirect()->route('assignments.index')->with('status', 'Assignment updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        //
        $assignment->update([
            'archived' => 1
        ]);
        return redirect()->route('assignments.index')->with('status', 'Assignment archived successfully!');
    }

    public function archive()
    {
        //
        $assignments = DB::table('assignments')->where('archived', '=', 1)->get();
        return view('instructor.assignments.assignment-archives')->with('assignments', $assignments);
    }

    public function unarchive(Assignment $assignment)
    {
        //
        $assignment->update([
            'archived' => 0
        ]);
        return redirect()->route('archived-assignments')->with('status', 'Assignment restored successfully!');
    }

    public function studentIndex()
    {
        //
        $assignments = DB::table('assignments')->where('archived', '=', 0)->get();
        return view('student.assignments.assignments')->with('assignments', $assignments);
    }
}
