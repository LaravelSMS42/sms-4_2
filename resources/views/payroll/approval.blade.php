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
            <span>Employee ID: {{ $payroll->employee_id }}</span>
            <span>Payment Information</span>
            <form action="{{ route('payroll.approve', $payroll->id) }}" method="POST" class="float-end ms-2">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Approve</button>
            </form>

            <!-- Decline Form -->
            <form action="{{ route('payroll.decline', $payroll->id) }}" method="POST" class="float-end">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Decline</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
