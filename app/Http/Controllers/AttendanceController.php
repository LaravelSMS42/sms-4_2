<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function create($id)
    {
        return view('attendance.create', compact('id')); // Correct view name
    }

    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'status' => 'required|string',
            'date' => 'required|date',
        ]);

        // Check if an attendance record already exists for the given employee and date
        $attendance = Attendance::where('employee_id', $request->employee_id)
                                ->where('date', $request->date)
                                ->first();

        if ($attendance) {
            // If the record exists, update the status
            $attendance->status = $request->status;
            $attendance->day = Carbon::parse($request->date)->format('l'); // Ensure the day is updated as well
            $attendance->save();

            return response()->json(['message' => 'Attendance status updated successfully']);
        } else {
            // If no record exists, create a new one
            $attendance = new Attendance();
            $attendance->employee_id = $request->employee_id;
            $attendance->status = $request->status;
            $attendance->date = $request->date;
            $attendance->day = Carbon::parse($request->date)->format('l');
            $attendance->save();

            return response()->json(['message' => 'Attendance recorded successfully']);
        }
    }
}
