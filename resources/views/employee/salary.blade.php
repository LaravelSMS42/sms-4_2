@extends('layout')

@section('content')
<div class="container">
    <h2>Salary Details for {{ $employee->name }}</h2>
    <p>Employee ID: {{ $employee->employee_id }}</p>
    <p>Role: {{ $employee->role }}</p>
    <p>Department: {{ $employee->department }}</p>

    @if($employee->role === 'Professor')
        <h3>Professor</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Component</th>
                    <th>PHP</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Monthly Salary</td><td>30,000</td></tr>
                <tr><td>Tax (approx.)</td><td>2,500</td></tr>
                <tr><td>SSS</td><td>600</td></tr>
                <tr><td>PhilHealth</td><td>400</td></tr>
                <tr><td>Pag-IBIG</td><td>200</td></tr>
                <tr><td><strong>Total Deductions</strong></td><td><strong>3,700</strong></td></tr>
                <tr><td><strong>Net Salary</strong></td><td><strong>26,300</strong></td></tr>
            </tbody>
        </table>
        <h4>Net In-Hand Salary for Professor: PHP 315,600 (Annual) / PHP 26,300 (Monthly)</h4>

    @elseif($employee->role === 'Treasury Staff')
        <h3>Treasury Staff</h3>
        <table class="table table-bordered">
            <thead>
                <tr><th>Component</th><th>PHP</th></tr>
            </thead>
            <tbody>
                <tr><td>Monthly Salary</td><td>20,000</td></tr>
                <tr><td>Tax (approx.)</td><td>1,600</td></tr>
                <tr><td>SSS</td><td>600</td></tr>
                <tr><td>PhilHealth</td><td>400</td></tr>
                <tr><td>Pag-IBIG</td><td>200</td></tr>
                <tr><td><strong>Total Deductions</strong></td><td><strong>2,800</strong></td></tr>
                <tr><td><strong>Net Salary</strong></td><td><strong>17,200</strong></td></tr>
            </tbody>
        </table>
        <h4>Net In-Hand Salary for Treasury Staff: PHP 206,400 (Annual) / PHP 17,200 (Monthly)</h4>

    @elseif($employee->role === 'Registrar')
        <h3>Registrar</h3>
        <table class="table table-bordered">
            <thead>
                <tr><th>Component</th><th>PHP</th></tr>
            </thead>
            <tbody>
                <tr><td>Monthly Salary</td><td>25,000</td></tr>
                <tr><td>Tax (approx.)</td><td>2,000</td></tr>
                <tr><td>SSS</td><td>600</td></tr>
                <tr><td>PhilHealth</td><td>400</td></tr>
                <tr><td>Pag-IBIG</td><td>200</td></tr>
                <tr><td><strong>Total Deductions</strong></td><td><strong>3,200</strong></td></tr>
                <tr><td><strong>Net Salary</strong></td><td><strong>21,800</strong></td></tr>
            </tbody>
        </table>
        <h4>Net In-Hand Salary for Registrar: PHP 261,600 (Annual) / PHP 21,800 (Monthly)</h4>

    @elseif($employee->role === 'Program Head')
        <h3>Program Head</h3>
        <table class="table table-bordered">
            <thead>
                <tr><th>Component</th><th>PHP</th></tr>
            </thead>
            <tbody>
                <tr><td>Monthly Salary</td><td>40,000</td></tr>
                <tr><td>Tax (approx.)</td><td>3,500</td></tr>
                <tr><td>SSS</td><td>600</td></tr>
                <tr><td>PhilHealth</td><td>400</td></tr>
                <tr><td>Pag-IBIG</td><td>200</td></tr>
                <tr><td><strong>Total Deductions</strong></td><td><strong>4,700</strong></td></tr>
                <tr><td><strong>Net Salary</strong></td><td><strong>35,300</strong></td></tr>
            </tbody>
        </table>
        <h4>Net In-Hand Salary for Program Head: PHP 423,600 (Annual) / PHP 35,300 (Monthly)</h4>

    @else
        <p>No salary information available for this role.</p>
    @endif
</div>
@endsection
