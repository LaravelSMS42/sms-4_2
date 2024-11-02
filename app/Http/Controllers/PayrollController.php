<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
}
