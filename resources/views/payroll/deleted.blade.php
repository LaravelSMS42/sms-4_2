@extends('layout')

@section('title', 'Deleted Payrolls')

@section('content')
<div class="container mt-4">
    <h1>Deleted Payrolls</h1>
    
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Transaction Type</th>
                <th>Status</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($deletedPayrolls as $payroll)
                <tr>
                    <td>{{ $payroll->id }}</td>
                    <td>{{ $payroll->employee_name }}</td>
                    <td>{{ $payroll->transaction_type }}</td>
                    <td>Declined</td>
                    <td>
                        <form action="{{ route('payroll.restore', $payroll->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning">Restore</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
