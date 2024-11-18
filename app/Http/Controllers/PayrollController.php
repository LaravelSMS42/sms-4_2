<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Attendance;

class PayrollController extends Controller
{
    /**
     * Display the create payroll form.
     */
    public function create()
    {
        $employees = Employee::all(); // Retrieve all employees
        return view('payroll.create', compact('employees')); // Pass employees to the view
    }

    public function getEmployeeName($id)
    {
        $employee = Employee::where('employee_id', $id)
                            ->where('frozen', false) // Only fetch if the account is not frozen
                            ->first();
    
        if ($employee) {
            return response()->json([
                'name' => $employee->name,
                'salary' => $employee->salary, // Include salary in the response
            ]);
        } else {
            return response()->json(['name' => null, 'salary' => null]);
        }
    }
    
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'employee_type' => 'required|string',
            'transaction_type' => 'required|string',
            'employee_id' => 'required|string',
            'employee_name' => 'required|string',
            'amount' => 'required|numeric', 
            // Remove date validation
        ]);
    
        // Check if the other fields are received
        \Log::info('Received data: ', $validatedData); // Log the received data for debugging
    
        // Create payroll with status set to 'pending'
        $payroll = Payroll::create(array_merge($validatedData, [
            'status' => 'pending',
            'unique_token' => random_int(1000000000, 9999999999), // Generate a unique token
        ]));
    
        // Check if the payroll entry was created successfully
        if ($payroll) {
            return redirect()->route('payroll.approval')->with('message', 'Payroll created successfully.');
        } else {
            return back()->withErrors(['error' => 'Failed to create payroll.']);
        }
    }
    
    

    /**
     * Display the payroll approval page.
     */
    public function showApprovalPage()
    {
        $pendingPayrolls = Payroll::where('approved', false)->get();
        return view('payroll.approval', compact('pendingPayrolls'));
    }

    /**
     * Get pending payrolls (API).
     */
    public function getPendingPayrolls()
    {
        $pendingPayrolls = Payroll::where('approved', false)->get();
        return response()->json($pendingPayrolls);
    }

    public function showHistoryPage(Request $request)
    {
        // Initialize the query
        $query = Payroll::query();

        // Get filter inputs
        $employeeId = trim($request->input('employee_id'));
        $status = $request->input('status');

        // Filter based on employee ID if provided
        if ($employeeId) {
            $query->where('employee_id', $employeeId); // Ensure data type matches
        }

        // Filter based on status if provided
        if ($status) {
            if ($status === 'approved') {
                $query->where('approved', true);
            } elseif ($status === 'declined') {
                $query->where('status', 'declined');
            } elseif ($status === 'pending') {
                $query->where('approved', false)->where('status', 'pending');
            }
        }

        // Log the query for debugging
        \Log::info($query->toSql(), $query->getBindings());

        // Paginate the filtered results
        $payrolls = $query->paginate(10);

        // Return the view with the payrolls
        return view('payroll.history', compact('payrolls'));
    }

    /**
     * Approve a payroll (API).
     */
    public function approveApi($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->approved = true;
        $payroll->status = 'approved'; // Set status to approved
        $payroll->save();
        return redirect()->route('payroll.approval')->with('message', 'Payroll approved successfully.');
    }

    /**
     * Decline a payroll (API).
     */
    public function declineApi($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->status = 'declined'; // Update status to 'declined'
        $payroll->approved = false; // Ensure approved is set to false
        $payroll->save(); // Save changes

        // Redirect back to the approval page (or any other page you want)
        return redirect()->route('payroll.deleted')->with('message', 'Payroll declined successfully.');
    }

    public function showDeleted()
{
    // Fetch all declined payrolls
    $deletedPayrolls = Payroll::where('status', 'declined')->get();

    return view('payroll.deleted', compact('deletedPayrolls'));
}

public function restore($id)
{
    $payroll = Payroll::findOrFail($id);
    $payroll->status = 'pending'; // Change status back to 'pending'
    $payroll->approved = false; // Reset approval status if necessary
    $payroll->save(); // Save the changes

    return redirect()->route('payroll.deleted')->with('message', 'Payroll restored successfully.');
}

public function getAttendance($employeeId, $month)
{
    // Get the start and end of the selected month
    $startOfMonth = Carbon::createFromFormat('Y-m', now()->year . '-' . $month)->startOfMonth();
    $endOfMonth = Carbon::createFromFormat('Y-m', now()->year . '-' . $month)->endOfMonth();

    // Get attendance data for the employee for the selected month
    $attendance = Attendance::where('employee_id', $employeeId)
        ->whereBetween('date', [$startOfMonth, $endOfMonth])
        ->get();

    // Initialize salary-related variables
    $salary = 0; // Initialize salary to 0
    $absentDays = 0;
    $bonus = 0;
    
    // Loop through each attendance record to calculate deductions/bonuses
    foreach ($attendance as $record) {
        $dayOfWeek = Carbon::parse($record->date)->format('l'); // Get the day of the week (e.g., Monday, Tuesday)
        $isPresent = $record->status === 'present'; // Check if present (absent otherwise)

        // Debugging: output the day and status of attendance for each day
        \Log::info('Day: ' . $dayOfWeek . ', Status: ' . $record->status);

        // Monday to Friday: Deduct 5% for each absent day
        if ($dayOfWeek !== 'Saturday' && $dayOfWeek !== 'Sunday') {
            if (!$isPresent) {
                $absentDays++;
            }
        }

        // Saturday and Sunday: Add 10% bonus if present
        if ($dayOfWeek === 'Saturday' || $dayOfWeek === 'Sunday') {
            if ($isPresent) {
                $bonus += 0.10; // 10% bonus for present on weekends
            }
        }
    }

    // Fetch the employee's base salary
    $employee = Employee::find($employeeId);
    $salary = $employee->salary;

    // Debugging: Check employee salary before deductions
    \Log::info('Base Salary: ' . $salary);

    // Calculate the total deductions for absent days from Monday to Friday
    $deductionPercentage = $absentDays * 0.05; // 5% deduction per absent day
    $deductionAmount = $salary * $deductionPercentage;

    // Debugging: Check the deduction amount for absent days
    \Log::info('Deduction Amount: ' . $deductionAmount);

    // Calculate the total bonus for Saturdays and Sundays
    $bonusAmount = $salary * $bonus;

    // Debugging: Check the bonus amount for weekends
    \Log::info('Bonus Amount: ' . $bonusAmount);

    // Adjust the salary based on deductions and bonuses
    $adjustedSalary = $salary - $deductionAmount + $bonusAmount;

    // Debugging: Check the final adjusted salary
    \Log::info('Adjusted Salary: ' . $adjustedSalary);

    return response()->json([
        'attendance' => $attendance,
        'adjustedSalary' => $adjustedSalary, // Return the adjusted salary
        'absentDays' => $absentDays, // Optionally return absent days for reference
        'bonusAmount' => $bonusAmount, // Return bonus for the weekends
        'deductionAmount' => $deductionAmount // Return deductions for weekdays
    ]);
}
}
