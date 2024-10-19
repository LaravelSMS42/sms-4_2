<?php

// app/Http/Controllers/PayrollController.php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    
    public function create()
    {
        return view('payroll.create'); // Show create payroll view
    }
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'employee_type' => 'required|string',
            'transaction_type' => 'required|string',
            'employee_id' => 'required|string',
            'employee_name' => 'required|string',
            'rate' => 'required|numeric',
            'allowance' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Create payroll
        $payroll = Payroll::create($validatedData);
        return redirect()->route('payroll.create')->with('success', 'Payroll created successfully.');
    }

    // Show the payroll approval page
    public function showApprovalPage()
    {
        $pendingPayrolls = Payroll::where('approved', false)->get();
        return view('payroll.approval', compact('pendingPayrolls'));
    }

    // API endpoint to get pending payroll data
    public function getPendingPayrolls()
    {
        $pendingPayrolls = Payroll::where('approved', false)->get();
        return response()->json($pendingPayrolls);
    }

    // Show the payroll history page
    public function showHistoryPage()
    {
        $payrolls = Payroll::paginate(10); // Retrieve all payrolls for the view
        return view('payroll.history', compact('payrolls'));
    }

    // API endpoint to get payroll history data
    public function getPayrollHistory()
    {
        $payrolls = Payroll::all(); // You might want to paginate this too
        return response()->json($payrolls);
    }

    // Approve Payroll (API version)
    public function approveApi($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->approved = true; // Set approved status
        $payroll->save(); // Save the changes
        return redirect()->route('payroll.approval')->with('success', 'Payroll approved successfully.');
    }

    // Decline Payroll (API version)
    public function declineApi($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->delete(); // Remove the payroll from the database
        return redirect()->route('payroll.approval')->with('success', 'Payroll approved successfully.');
    }
}

