@extends('layout')

@section('content')
<div class="container">
    <h2>Salary Details for {{ $employee->name }}</h2>
    <p>Employee ID: {{ $employee->employee_id }}</p>
    <p>Role: {{ $employee->role }}</p>
    <p>Department: {{ $employee->department }}</p>

    @if($employee->role === 'Faculty')
        <h3>School Faculty (Teacher I - PHP 35,000 Base Salary)</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Component</th>
                    <th>Per Annum (PHP)</th>
                    <th>Per Month (PHP)</th>
                    <th>Taxable/Non-Taxable</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basic Salary</td>
                    <td>420,000</td>
                    <td>35,000</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>HRA</td>
                    <td>84,000</td>
                    <td>7,000</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>Medical</td>
                    <td>15,000</td>
                    <td>1,250</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td>Special Allowance</td>
                    <td>42,000</td>
                    <td>3,500</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>Communication</td>
                    <td>24,000</td>
                    <td>2,000</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>Transportation</td>
                    <td>72,000</td>
                    <td>6,000</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td>Year-End Bonus</td>
                    <td>35,000</td>
                    <td>-</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>Clothing Allowance</td>
                    <td>6,000</td>
                    <td>-</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td><strong>Gross Salary</strong></td>
                    <td><strong>696,000</strong></td>
                    <td><strong>58,000</strong></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <h3>Deductions for School Faculty</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Deduction</th>
                    <th>Per Annum (PHP)</th>
                    <th>Per Month (PHP)</th>
                    <th>Taxable/Non-Taxable</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GSIS Contribution</td>
                    <td>21,000</td>
                    <td>1,750</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>PhilHealth</td>
                    <td>5,400</td>
                    <td>450</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td>Pag-IBIG</td>
                    <td>1,200</td>
                    <td>100</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td>Withholding Tax</td>
                    <td>30,000</td>
                    <td>2,500</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td><strong>Total Deductions</strong></td>
                    <td><strong>57,600</strong></td>
                    <td><strong>4,800</strong></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <h4>Net In-Hand Salary for Faculty: PHP 638,400 (Annual) / PHP 53,200 (Monthly)</h4>
    @elseif($employee->role === 'Staff')
        <h3>School Staff (Admin Support - PHP 25,000 Base Salary)</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Component</th>
                    <th>Per Annum (PHP)</th>
                    <th>Per Month (PHP)</th>
                    <th>Taxable/Non-Taxable</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basic Salary</td>
                    <td>300,000</td>
                    <td>25,000</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>HRA</td>
                    <td>60,000</td>
                    <td>5,000</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>Medical</td>
                    <td>12,000</td>
                    <td>1,000</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td>Special Allowance</td>
                    <td>30,000</td>
                    <td>2,500</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>Communication</td>
                    <td>12,000</td>
                    <td>1,000</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>Transportation</td>
                    <td>48,000</td>
                    <td>4,000</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td>Year-End Bonus</td>
                    <td>25,000</td>
                    <td>-</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>Clothing Allowance</td>
                    <td>6,000</td>
                    <td>-</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td><strong>Gross Salary</strong></td>
                    <td><strong>493,000</strong></td>
                    <td><strong>41,080</strong></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <h3>Deductions for School Staff</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Deduction</th>
                    <th>Per Annum (PHP)</th>
                    <th>Per Month (PHP)</th>
                    <th>Taxable/Non-Taxable</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GSIS Contribution</td>
                    <td>15,000</td>
                    <td>1,250</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td>PhilHealth</td>
                    <td>4,200</td>
                    <td>350</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td>Pag-IBIG</td>
                    <td>1,200</td>
                    <td>100</td>
                    <td>Non-Taxable</td>
                </tr>
                <tr>
                    <td>Withholding Tax</td>
                    <td>20,000</td>
                    <td>1,667</td>
                    <td>Taxable</td>
                </tr>
                <tr>
                    <td><strong>Total Deductions</strong></td>
                    <td><strong>40,400</strong></td>
                    <td><strong>3,367</strong></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <h4>Net In-Hand Salary for Staff: PHP 452,600 (Annual) / PHP 37,713 (Monthly)</h4>
    @else
        <p>No salary information available for this role.</p>
    @endif
</div>
@endsection
