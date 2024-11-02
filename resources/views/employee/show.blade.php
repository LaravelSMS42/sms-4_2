@extends('layout')

@section('content')
<div class="container">
    <h2>Employee List</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($employees->isEmpty())
        <div class="alert alert-warning">
            No employee found.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->employee_id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->role }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>${{ number_format($employee->salary, 2) }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('employee.salary', $employee->employee_id) }}">View Salary</a></li>
                                <li><a class="dropdown-item" href="{{ route('attendance.create', $employee->employee_id) }}">Take Attendance</a></li>
                                
                                <!-- Freeze/Unfreeze Account -->
                                @if(!$employee->frozen)
                                    <li>
                                        <form action="{{ route('employee.freeze', $employee->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to freeze this employee account?');">Freeze Account</button>
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <form action="{{ route('employee.unfreeze', $employee->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to unfreeze this employee account?');">Unfreeze Account</button>
                                        </form>
                                    </li>
                                @endif

                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editEmployeeModal-{{ $employee->id }}">Edit</button>
                                </li>
                                <li>
                                    <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

                <!-- Edit Employee Modal -->
                <div class="modal fade" id="editEmployeeModal-{{ $employee->id }}" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name-{{ $employee->id }}">Name:</label>
                                        <input type="text" class="form-control" id="name-{{ $employee->id }}" name="name" value="{{ $employee->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="role-{{ $employee->id }}">Role:</label>
                                        <select class="form-control" id="role-{{ $employee->id }}" name="role" required onchange="updateSalary('{{ $employee->id }}')">
                                            <option value="Professor" {{ $employee->role == 'Professor' ? 'selected' : '' }}>Professor</option>
                                            <option value="Registrar" {{ $employee->role == 'Registrar' ? 'selected' : '' }}>Registrar</option>
                                            <option value="Treasury" {{ $employee->role == 'Treasury' ? 'selected' : '' }}>Treasury</option>
                                            <option value="Program Head" {{ $employee->role == 'Program Head' ? 'selected' : '' }}>Program Head</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="department-{{ $employee->id }}">Department:</label>
                                        <select class="form-control" id="department-{{ $employee->id }}" name="department" required>
                                            <option value="CAS" {{ $employee->department == 'CAS' ? 'selected' : '' }}>CAS (College of Arts and Sciences)</option>
                                            <option value="CBA" {{ $employee->department == 'CBA' ? 'selected' : '' }}>CBA (College of Business and Accountancy)</option>
                                            <option value="CCJE" {{ $employee->department == 'CCJE' ? 'selected' : '' }}>CCJE (Criminal Justice Education)</option>
                                            <option value="COED" {{ $employee->department == 'COED' ? 'selected' : '' }}>COED (College of Education)</option>
                                            <option value="CAMS" {{ $employee->department == 'CAMS' ? 'selected' : '' }}>CAMS (College of Allied Medical Sciences)</option>
                                            <option value="COM" {{ $employee->department == 'COM' ? 'selected' : '' }}>COM (College of Medicine)</option>
                                            <option value="COL" {{ $employee->department == 'COL' ? 'selected' : '' }}>COL (College of Law)</option>
                                            <option value="CECT" {{ $employee->department == 'CECT' ? 'selected' : '' }}>CECT (College of Engineering and Computer Studies)</option>
                                            <option value="CHTM" {{ $employee->department == 'CHTM' ? 'selected' : '' }}>CHTM (College of Hospitality and Tourism Management)</option>
                                            <option value="CON" {{ $employee->department == 'CON' ? 'selected' : '' }}>CON (College of Nursing)</option>
                                            <option value="MAN" {{ $employee->department == 'MAN' ? 'selected' : '' }}>MAN (MA in Nursing)</option>
                                            <option value="SOLAS" {{ $employee->department == 'SOLAS' ? 'selected' : '' }}>SOLAS (School of Leadership and Advanced Studies)</option>
                                            <option value="CWSM" {{ $employee->department == 'CWSM' ? 'selected' : '' }}>CWSM (Charles Wesley School of Music)</option>
                                            <option value="WDS" {{ $employee->department == 'WDS' ? 'selected' : '' }}>WDS (Wesley Divinity School)</option>
                                            <!-- Add more departments as needed -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary-{{ $employee->id }}">Salary:</label>
                                        <input type="number" class="form-control" id="salary-{{ $employee->id }}" name="salary" value="{{ $employee->salary }}" readonly required>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customSalaryCheckbox-{{ $employee->id }}" onclick="toggleCustomSalary('{{ $employee->id }}')">
                                            <label class="form-check-label" for="customSalaryCheckbox-{{ $employee->id }}">Use Custom Salary</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('employee.create') }}" class="btn btn-primary">Create New Employee</a>
</div>

<script>
function updateSalary(employeeId) {
    const roleSelect = document.getElementById(`role-${employeeId}`);
    const salaryInput = document.getElementById(`salary-${employeeId}`);
    
    switch (roleSelect.value) {
        case 'Professor':
            salaryInput.value = 30000; // Monthly salary for Professor
            break;
        case 'Registrar':
            salaryInput.value = 25000; // Monthly salary for Registrar
            break;
        case 'Treasury':
            salaryInput.value = 20000; // Monthly salary for Treasury Staff
            break;
        case 'Program Head':
            salaryInput.value = 40000; // Monthly salary for Program Head
            break;
        default:
            salaryInput.value = ''; // Clear salary if no role is selected
    }
}

function toggleCustomSalary(employeeId) {
    const salaryInput = document.getElementById(`salary-${employeeId}`);
    const checkbox = document.getElementById(`customSalaryCheckbox-${employeeId}`);
    
    if (checkbox.checked) {
        salaryInput.readOnly = false; // Allow input of custom salary
        salaryInput.value = ''; // Clear the salary input
    } else {
        salaryInput.readOnly = true; // Make salary input read-only
        updateSalary(employeeId); // Reset to the base salary based on the selected role
    }
}
</script>
@endsection
