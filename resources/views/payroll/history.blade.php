@extends('layout')

@section('title', 'Payroll History')

@section('content')
<div class="container mt-4">
    <h1>Payroll History</h1>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Search by Employee ID" aria-label="Search">
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Date</th>
                <th>Allowance</th>
                <th>Rate</th>
                <th>Approval Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
            <tr class="{{ $payroll->approved ? '' : 'table-warning' }}">
                <td>{{ $payroll->employee_id }}</td>
                <td>{{ $payroll->employee_name }}</td>
                <td>{{ $payroll->date }}</td>
                <td>{{ number_format($payroll->allowance, 2) }}</td>
                <td>{{ $payroll->rate }}</td>
                <td>{{ $payroll->approved ? 'Approved' : 'Pending' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
