@extends('layout')

@section('title', 'Payroll Approval')

@section('content')
<div class="container mt-4">
    <h1>Payroll Approval</h1>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search">
    </div>

    <div class="list-group">
        @foreach($pendingPayrolls as $payroll)
        <div class="list-group-item">
            <div>
                <strong>Employee ID:</strong> {{ $payroll->employee_id }}
            </div>
            <div>
                <strong>Employee Name:</strong> {{ $payroll->employee_name }}
            </div>
            <div>
                <strong>Transaction Type:</strong> {{ $payroll->transaction_type }}
            </div>
            <div>
                <strong>Rate:</strong> {{ $payroll->rate }}
            </div>
            <div>
                <strong>Allowance:</strong> ${{ number_format($payroll->allowance, 2) }}
            </div>
            <div>
                <strong>Date:</strong> {{ $payroll->date }}
            </div>

            <div class="float-end">
                <!-- Approve Form -->
                <form action="{{ route('payroll.approve', $payroll->id) }}" method="POST" class="d-inline-block ms-2">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                </form>

                <!-- Decline Form -->
                <form action="{{ route('payroll.decline', $payroll->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
