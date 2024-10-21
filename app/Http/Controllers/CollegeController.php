<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use App\Models\College;
use App\Models\Building;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $colleges = DB::table('colleges')->where('archived', '=', 0)->get();
        return view('admin.college.college')->with('colleges', $colleges);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $buildings = Building::all();
        return view('admin.college.add-college')->with('buildings', $buildings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$fields = $request->all();
        $request->validate([
            'college_name' => 'required|string',
            'college_acronym' => 'required|string',
            'college_email' => 'required|email',
            'building_id' => 'nullable'
        ]);

        College::create($request->all());
        return redirect()->route('college.index')->with('status', 'College added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        //
        $departments = DB::table('departments')->where('archived', '=', 0)->where('college_id', '=', $college->id)->get();
        return view('admin.college.department', compact('college'))->with('departments', $departments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(College $college)
    {
        //
        $buildings = Building::all();
        $existingBuildingId = DB::table('colleges')->where('building_id', '=', $college->building_id)->where('id', '=', $college->id)->pluck('building_id')->first();
        return view('admin.college.edit-college', compact('college'))->with('buildings', $buildings)->with('existingBuildingId', $existingBuildingId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, College $college)
    {
        //
        $request->validate([
            'college_name' => 'required|string',
            'college_acronym' => 'required|string',
            'college_email' => 'required|email',
            'building_id' => 'nullable'
        ]);

        $college->update($request->all());
        return redirect()->route('college.index')->with('status', 'College updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(College $college)
    {
        //
        $college->update([
            'archived' => 1
        ]);
        return redirect()->route('college.index')->with('status', 'College archived successfully!');
    }

    public function archive()
    {
        //
        $colleges = DB::table('colleges')->where('archived', '=', 1)->get();
        return view('admin.college.college-archives')->with('colleges', $colleges);
    }

    public function unarchive(College $college)
    {
        //
        $college->update([
            'archived' => 0
        ]);
        return redirect()->route('archived-colleges')->with('status', 'College restored successfully!');
    }

    public function departments(College $college)
    {
        //
        $departments = DB::table('departments')->where('archived', '=', 0)->where('college_id', '=', $college->id)->get();
        return view('admin.college.department', compact('college'))->with('departments', $departments);
    }

    public function programs(College $college)
    {
        //
        $programs = DB::table('programs')->where('archived', '=', 0)->where('college_id', '=', $college->id)->get();
        return view('admin.college.college-programs', compact('college'))->with('programs', $programs);
    }
}
