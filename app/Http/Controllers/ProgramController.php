<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\College;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $programs = DB::table('programs')->where('archived', '=', 0)->get();
        return view('admin.program.all-programs')->with('programs', $programs);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $colleges = DB::table('colleges')->where('archived', '=', 0)->get();
        $departments = DB::table('departments')->where('archived', '=', 0)->get();
        return view('admin.program.add-program')->with('departments', $departments)->with('colleges', $colleges);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'college_id' => 'nullable',
            'department_id' => 'nullable',
            'program_name' => 'required|string',
            'program_code' => 'required|string',
        ]);

        Program::create($request->all());
        return redirect()->route('programs.index')->with('status', 'Program added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
        $colleges = DB::table('colleges')->where('archived', '=', 0)->get();
        $departments = DB::table('departments')->where('archived', '=', 0)->get();
        $existingDepartmentId = DB::table('programs')->where('department_id', '=', $program->department_id)->where('id', '=', $program->id)->pluck('department_id')->first();
        $existingCollegeId = DB::table('programs')->where('college_id', '=', $program->college_id)->where('id', '=', $program->id)->pluck('college_id')->first();
        return view('admin.program.edit-program', compact('program'))->with('departments', $departments)->with('colleges', $colleges)->with('existingDepartmentId', $existingDepartmentId)->with('existingCollegeId', $existingCollegeId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        //
        $request->validate([
            'college_id' => 'nullable',
            'department_id' => 'nullable',
            'program_name' => 'required|string',
            'program_code' => 'required|string',
        ]);

        $program->update($request->all());
        return redirect()->route('program.index')->with('status', 'Program updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //
        $program->update([
            'archived' => 1
        ]);
        return redirect()->route('program.index')->with('status', 'Program archived successfully!');
    }

    public function archive()
    {
        //
        $programs = DB::table('programs')->where('archived', '=', 1)->get();
        return view('admin.program.program-archives')->with('programs', $programs);
    }

    public function unarchive(Program $program)
    {
        //
        $program->update([
            'archived' => 0
        ]);
        return redirect()->route('archived-programs')->with('status', 'Department restored successfully!');
    }
}
