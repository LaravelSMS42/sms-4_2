<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';
    protected $fillable = [
        'college_id',
        'department_id',
        'program_name',
        'program_code',
        'archived'
    ];
}
