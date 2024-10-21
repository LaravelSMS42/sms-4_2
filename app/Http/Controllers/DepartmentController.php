<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\College;
use App\Models\Building;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = DB::table('departments')->where('archived', '=', 0)->get();
        return view('admin.department.all-depts')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $buildings = Building::all();
        $colleges = DB::table('colleges')->where('archived', '=', 0)->get();;
        return view('admin.department.add-department')->with('buildings', $buildings)->with('colleges', $colleges);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'college_id' => 'nullable',
            'department_name' => 'required|string',
            'department_email' => 'required|email',
            'building_id' => 'nullable'
        ]);

        Department::create($request->all());
        return redirect()->route('department.index')->with('status', 'Department added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
        $buildings = Building::all();
        $colleges = DB::table('colleges')->where('archived', '=', 0)->get();
        $existingBuildingId = DB::table('departments')->where('building_id', '=', $department->building_id)->where('id', '=', $department->id)->pluck('building_id')->first();
        $existingCollegeId = DB::table('departments')->where('college_id', '=', $department->college_id)->where('id', '=', $department->id)->pluck('college_id')->first();
        return view('admin.department.edit-department', compact('department'))->with('buildings', $buildings)->with('colleges', $colleges)->with('existingBuildingId', $existingBuildingId)->with('existingCollegeId', $existingCollegeId);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
        $request->validate([
            'college_id' => 'nullable',
            'department_name' => 'required|string',
            'department_email' => 'required|email',
            'building_id' => 'nullable'
        ]);

        $department->update($request->all());
        return redirect()->route('department.index')->with('status', 'Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
        $department->update([
            'archived' => 1
        ]);
        return redirect()->route('department.index')->with('status', 'Department archived successfully!');
    }

    public function archive()
    {
        //
        $departments = DB::table('departments')->where('archived', '=', 1)->get();
        return view('admin.department.dept-archives')->with('departments', $departments);
    }

    public function unarchive(Department $department)
    {
        //
        $department->update([
            'archived' => 0
        ]);
        return redirect()->route('archived-depts')->with('status', 'Department restored successfully!');
    }
}
