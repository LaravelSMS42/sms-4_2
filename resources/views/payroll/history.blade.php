@extends('layout')

@section('title', 'Payroll History')

@section('content')
<div class="container mt-4">
    <h1>Payroll History</h1>
    
    <form method="GET" action="{{ route('payroll.history') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="employee_id" class="form-control" placeholder="Employee ID" value="{{ request('employee_id') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="declined" {{ request('status') === 'declined' ? 'selected' : '' }}>Declined</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Employee Type</th>
                <th>Transaction Type</th>
                <th>Amount</th> <!-- Changed from Allowance to Amount -->
                <th>Date</th> <!-- Changed to display created date -->
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->employee_id }}</td>
                    <td>{{ $payroll->employee_name }}</td>
                    <td>{{ $payroll->employee_type }}</td>
                    <td>{{ $payroll->transaction_type }}</td>
                    <td>{{ $payroll->amount }}</td> <!-- Displaying Amount -->
                    <td>{{ $payroll->created_at->format('Y-m-d') }}</td> <!-- Displaying created date -->
                    <td>
                        @if($payroll->approved)
                            Approved
                        @elseif($payroll->status === 'declined')
                            Declined
                        @else
                            Pending
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $payrolls->links() }} <!-- Pagination links -->
</div>
@endsection
