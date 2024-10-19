@extends('layout')

@section('title', 'Payroll History')

@section('content')
<div class="container mt-4">
    <h1>Payroll History</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Transaction Type</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->id }}</td>
                    <td>{{ $payroll->employee_name }}</td>
                    <td>{{ $payroll->transaction_type }}</td>
                    <td>{{ $payroll->date }}</td>
                    <td>{{ $payroll->approved ? 'Approved' : 'Pending' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $payrolls->links() }} <!-- Pagination links -->
</div>
@endsection
