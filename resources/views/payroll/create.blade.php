@extends('layout')

@section('title', 'Create Payroll')

@section('content')
<div class="container mt-4">
    <h1>Create Payroll</h1>
    <form action="{{ route('payroll.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="employee_type" class="form-label">Employee Type</label>
            <select class="form-select" name="employee_type" id="employee_type" required>
                <option value="permanent">Permanent</option>
                <option value="contract">Contract</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="transaction_type" class="form-label">Transaction Type</label>
            <select class="form-select" name="transaction_type" id="transaction_type" required>
                <option value="salary">Salary</option>
                <option value="allowance">Allowance</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="employee_id" class="form-label">Employee ID</label>
            <input type="text" class="form-control" id="employee_id" name="employee_id" required>
            @error('employee_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="employee_name" class="form-label">Employee Name</label>
            <input type="text" class="form-control" id="employee_name" name="employee_name" required>
            @error('employee_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rate" class="form-label">Rate</label>
            <input type="number" class="form-control" id="rate" name="rate" required>
            @error('rate')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="allowance" class="form-label">Allowance</label>
            <input type="number" class="form-control" id="allowance" name="allowance" required>
            @error('allowance')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
            @error('date')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
