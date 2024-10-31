<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Add this line

class EmployeeController extends Controller
{
    public function index()
    {
        // Retrieve all employees from the database
        $employees = Employee::all();
    
        // Return the view with the list of employees
        return view('employee.show', compact('employees')); // Correct view reference
    }
    
    
    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
{
    // Validate the incoming data
    $request->validate([
        'name' => 'required|string|max:255',
        'role' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'salary' => 'required|numeric',
    ]);

    // Generate a unique numeric employee ID
    $employeeId = Employee::max('employee_id') + 1; // Increment the max employee_id for uniqueness
    // If employee_id is NULL (for the first entry), start from 1
    if (is_null($employeeId)) {
        $employeeId = 1;
    }

    // Create the employee with the generated employee_id
    $employee = Employee::create(array_merge($request->all(), ['employee_id' => $employeeId]));

    // Redirect to the show page with a success message
    return redirect()->route('employee.create', $employee->id)
        ->with('success', 'Employee created successfully');
}

    public function show($id)
    {
        // Find the employee by ID
        $employee = Employee::findOrFail($id);

        // Return the view with employee details
        return view('employee.show', compact('employee'));
    }
    public function destroy($id)
{
    // Find the employee by ID and delete
    $employee = Employee::findOrFail($id);
    $employee->delete();

    // Redirect back with a success message
    return redirect()->route('employee.index')->with('success', 'Employee deleted successfully');
}

}
