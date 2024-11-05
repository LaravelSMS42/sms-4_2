<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $fillable = [
        'title',
        'instructions',
        'points',
        'deadline_date',
        'available_date',
        'course_id',
        'employee_id',
        'allow_attachments',
        'archived',
    ];
}
