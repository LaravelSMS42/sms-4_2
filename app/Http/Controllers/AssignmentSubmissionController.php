<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmission;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class AssignmentSubmissionController extends Controller
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
        $file = $request->file('attachment');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filepath = $file->storeAs('attachments', $filename);

        $dueDate =  DB::table('assignments')->where('id', '=', $request->task_id)->first();
        if($dueDate->deadline_date < date('Y-m-d H:i:s')){
            AssignmentSubmission::create([
                'answer' => $request->answer,
                'attachment_path' => $filepath,
                'task_id' => $request->task_id,
                'is_late' => 1
            ]);
        }
        else{
            AssignmentSubmission::create([
                'answer' => $request->answer,
                'attachment_path' => $filepath,
                'task_id' => $request->task_id
            ]); 
        }
        
        return redirect()->route('assignments.show', $request->task_id)->with('message', 'Assignment submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    public function createSubmission(Assignment $assignment)
    {
        return view('student.assignments.create-assignment', compact('assignment'));
    }
}
