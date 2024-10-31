<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_type',
        'transaction_type',
        'employee_id',
        'employee_name',
        'amount',
        'date',
        'approved',
        'status',
        'unique_token', 
    ];
}
