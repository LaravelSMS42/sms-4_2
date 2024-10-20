<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $table = 'colleges';
    protected $fillable = [
        'college_name',
        'college_acronym',
        'college_email',
        'building_id',
        'archived'
    ];
}
