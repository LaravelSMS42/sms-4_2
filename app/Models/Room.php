<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'room_number',
        'building_info',
        'building_number',
        'college_department_name',
        'faculty_assignments',
    ];

    
}