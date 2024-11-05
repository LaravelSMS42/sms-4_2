<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
    protected $table = 'exam_questions';
    protected $fillable = [
        'question',
        'answer',
        'points',
        'task_id',
    ];
}
