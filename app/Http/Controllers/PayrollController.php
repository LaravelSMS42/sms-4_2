<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function create()
    {
        return view('payroll.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_type' => 'required|string',
            'transaction_type' => 'required|string',
            'employee_id' => 'required|string',
            'employee_name' => 'required|string',
            'rate' => 'required|numeric',
            'allowance' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Payroll::create($validatedData); // Save to the database
        return redirect()->route('payroll.approval')->with('success', 'Payroll created successfully.');
    }

    public function history()
    {
        $payrolls = Payroll::where('approved', true)->get(); // Fetch approved payrolls
        return view('payroll.history', compact('payrolls')); // Pass data to the view
    }

    public function approval()
    {
        $pendingPayrolls = Payroll::where('approved', false)->get(); // Fetch pending payrolls
        return view('payroll.approval', compact('pendingPayrolls')); // Pass data to the view
    }

    public function approve($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->approved = true; // Set approved status
        $payroll->save(); // Save the changes

        return redirect()->route('payroll.history')->with('success', 'Payroll approved successfully.');
    }
}
