<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    use HasFactory;

    protected $table = 'assignment_submissions';
    protected $fillable = [
        'answer',
        'points',
        'attachment_path',
        'task_id',
        'is_late',
        'is_graded'
    ];
}
