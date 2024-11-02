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
        'password' => 'required|string|min:4'
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
public function showSalary($employee_id)
{
    // Fetch the employee's details using employee_id instead of id
    $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

    // Pass the employee data to the view
    return view('employee.salary', compact('employee'));
}

public function freeze($id)
{
    $employee = Employee::findOrFail($id);
    $employee->frozen = true;
    $employee->save();

    return redirect()->route('employee.index')->with('success', 'Employee account has been frozen.');
}
public function unfreeze($id)
{
    $employee = Employee::findOrFail($id);
    $employee->frozen = false;
    $employee->save();

    return redirect()->route('employee.index')->with('success', 'Employee account has been unfrozen.');
}
public function edit($id)
{
    $employee = Employee::findOrFail($id); // Find the employee by ID
    return view('employee.edit', compact('employee')); // Return the edit view with employee data
}
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'role' => 'required|string',
        'department' => 'required|string',
        'salary' => 'required|numeric',
    ]);

    $employee = Employee::findOrFail($id);
    $employee->update($validatedData); // Update the employee with validated data

    return redirect()->route('employee.index')->with('success', 'Employee updated successfully.'); // Redirect back to employee list
}


}
