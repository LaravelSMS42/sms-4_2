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
            <select class="form-select" id="employee_id" name="employee_id" required>
                <option value="">Select Employee ID</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->employee_id }}">{{ $employee->employee_id }}</option>
                @endforeach
            </select>
            @error('employee_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="employee_name" class="form-label">Employee Name</label>
            <input type="text" class="form-control" id="employee_name" name="employee_name" readonly>
            @error('employee_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" readonly>
            @error('amount')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Month Dropdown -->
        <div class="mb-3">
            <label for="month" class="form-label">Month</label>
            <select class="form-select" name="month" id="month" required>
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->format('F') }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.getElementById('transaction_type').addEventListener('change', handleTransactionType);
    document.getElementById('employee_id').addEventListener('change', fetchEmployeeData);
    document.getElementById('month').addEventListener('change', fetchAttendanceData);

    function handleTransactionType() {
        const transactionType = document.getElementById('transaction_type').value;
        const amountField = document.getElementById('amount');
        if (transactionType === 'salary') {
            amountField.readOnly = true;
            fetchEmployeeData();
        } else {
            amountField.readOnly = false;
            amountField.value = '';
        }
    }

    function fetchEmployeeData() {
        const employeeId = document.getElementById('employee_id').value;

        if (employeeId) {
            fetch(`/payroll/get-employee-name/${employeeId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('employee_name').value = data.name || '';
                    document.getElementById('amount').value = data.salary || '';
                    if (document.getElementById('transaction_type').value === 'salary') {
                        document.getElementById('amount').readOnly = true;
                    } else {
                        document.getElementById('amount').readOnly = false;
                    }
                })
                .catch(error => console.error('Error fetching employee data:', error));
        } else {
            document.getElementById('employee_name').value = '';
            document.getElementById('amount').value = '';
        }
    }

    function fetchAttendanceData() {
    const employeeId = document.getElementById('employee_id').value;
    const month = document.getElementById('month').value;

    if (employeeId && month) {
        fetch(`/payroll/get-attendance/${employeeId}/${month}`)
            .then(response => response.json())
            .then(data => {
                // Show the adjusted salary in the amount field
                document.getElementById('amount').value = data.adjustedSalary || '';
            })
            .catch(error => console.error('Error fetching attendance data:', error));
    }
}

</script>
@endsection