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
                        <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-info btn-sm">View</a>
                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE') <!-- This directive is required to send a DELETE request -->
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('employee.create') }}" class="btn btn-primary">Create New Employee</a>
</div>
@endsection
