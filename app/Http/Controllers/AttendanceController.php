<?php

// app/Http/Controllers/AttendanceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceController extends Controller
{
    public function create($id)
    {
        return view('attendance.create', compact('id')); // Correct view name
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id', // Changed to use employee_id
            'status' => 'required|string',
            'date' => 'required|date',
        ]);
    
        $attendance = new Attendance();
        $attendance->employee_id = $request->employee_id; // Set employee_id
        $attendance->status = $request->status;
        $attendance->date = $request->date;
        $attendance->save();
    
        return response()->json(['message' => 'Attendance recorded successfully']);
    }
    
}

