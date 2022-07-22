<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    use HasFactory;

    protected $table = 'work_shifts';

    protected $fillable = [
        'name_work',
        'time_start',
        'time_end',
        'basic_salary',
        'bonus',
    ];
}
