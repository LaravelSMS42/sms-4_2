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
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="role" name="role" required onchange="updateSalary()">
                <option value="" disabled selected>Select Role</option>
                <option value="Professor">Professor</option>
                <option value="Registrar">Registrar</option>
                <option value="Treasury">Treasury</option>
                <option value="Program Head">Program Head</option>
            </select>
        </div>

        <div class="form-group">
            <label for="department">Department:</label>
            <select class="form-control" id="department" name="department" required>
                <option value="" disabled selected>Select Department</option>
                <option value="CAS">CAS (College of Arts and Sciences)</option>
                <option value="CBA">CBA (College of Business and Accountancy)</option>
                <option value="CCJE">CCJE (Criminal Justice Education)</option>
                <option value="COED">COED (College of Education)</option>
                <option value="CAMS">CAMS (College of Allied Medical Sciences)</option>
                <option value="COM">COM (College of Medicine)</option>
                <option value="COL">COL (College of Law)</option>
                <option value="CECT">CECT (College of Engineering and Computer Studies)</option>
                <option value="CHTM">CHTM (College of Hospitality and Tourism Management)</option>
                <option value="CON">CON (College of Nursing)</option>
                <option value="MAN">MAN (MA in Nursing)</option>
                <option value="SOLAS">SOLAS (School of Leadership and Advanced Studies)</option>
                <option value="CWSM">CWSM (Charles Wesley School of Music)</option>
                <option value="WDS">WDS (Wesley Divinity School)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" class="form-control" id="salary" name="salary" readonly required>
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
    
    switch (roleSelect.value) {
        case 'Professor':
            salaryInput.value = 30000; // Monthly salary for Professor
            break;
        case 'Treasury Staff':
            salaryInput.value = 20000; // Monthly salary for Treasury Staff
            break;
        case 'Registrar':
            salaryInput.value = 25000; // Monthly salary for Registrar
            break;
        case 'Program Head':
            salaryInput.value = 40000; // Monthly salary for Program Head
            break;
        default:
            salaryInput.value = ''; // Clear salary if no role is selected
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
