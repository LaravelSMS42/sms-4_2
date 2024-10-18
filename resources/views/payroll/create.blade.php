@extends('layout')

@section('title', 'Create Payroll')

@section('content')
<div class="container mt-4">
    <h1>Create Payroll</h1>
    <form action="{{ route('payroll.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="employee_type" class="form-label">Employee Type</label>
                <select class="form-select" name="employee_type" id="employee_type">
                    <option value="permanent">Permanent</option>
                    <option value="contract">Contract</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="transaction_type" class="form-label">Transaction Type</label>
                <select class="form-select" name="transaction_type" id="transaction_type">
                    <option value="salary">Salary</option>
                    <option value="allowance">Allowance</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="employee_id" class="form-label">Employee ID</label>
                <input type="text" class="form-control" id="employee_id" name="employee_id">
            </div>

            <div class="col-md-6">
                <label for="employee_name" class="form-label">Employee Name</label>
                <input type="text" class="form-control" id="employee_name" name="employee_name">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="rate" class="form-label">Rate</label>
                <input type="number" class="form-control" id="rate" name="rate">
            </div>

            <div class="col-md-6">
                <label for="allowance" class="form-label">Allowance</label>
                <input type="number" class="form-control" id="allowance" name="allowance">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
