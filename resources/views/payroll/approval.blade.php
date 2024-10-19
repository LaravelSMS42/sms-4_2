@extends('layout')

@section('title', 'Payroll Approval')

@section('content')
<div class="container mt-4">
    <h1>Payroll Approval</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Transaction Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingPayrolls as $payroll)
                <tr>
                    <td>{{ $payroll->id }}</td>
                    <td>{{ $payroll->employee_name }}</td>
                    <td>{{ $payroll->transaction_type }}</td>
                    <td>
                        <form action="{{ route('payroll.approve.api', $payroll->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('payroll.decline.api', $payroll->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
