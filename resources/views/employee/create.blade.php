@extends('layout')

@section('content')
<div class="container">
    <h2>Create New Employee</h2>

    <form action="{{ route('employee.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="role" name="role" required onchange="updateSalary()">
                <option value="" disabled selected>Select Role</option>
                <option value="Faculty">Faculty</option>
                <option value="Staff">Staff</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>

        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" class="form-control" id="salary" name="salary" value="35000" readonly required>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customSalaryCheckbox" onclick="toggleCustomSalary()">
                <label class="form-check-label" for="customSalaryCheckbox">Use Custom Salary</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create Employee</button>
    </form>
</div>

<script>
    function updateSalary() {
        const roleSelect = document.getElementById('role');
        const salaryInput = document.getElementById('salary');
        
        if (roleSelect.value === 'Faculty') {
            salaryInput.value = 35000; // Base salary for Faculty
        } else if (roleSelect.value === 'Staff') {
            salaryInput.value = 25000; // Base salary for Staff
        }
    }

    function toggleCustomSalary() {
        const salaryInput = document.getElementById('salary');
        const checkbox = document.getElementById('customSalaryCheckbox');
        
        if (checkbox.checked) {
            salaryInput.readOnly = false; // Allow input of custom salary
            salaryInput.value = ''; // Clear the salary input
        } else {
            salaryInput.readOnly = true; // Make salary input read-only
            updateSalary(); // Reset to the base salary based on the selected role
        }
    }
</script>
@endsection
