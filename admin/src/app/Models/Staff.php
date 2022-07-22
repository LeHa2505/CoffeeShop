<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_BLOCKED = 0;
    const POSITION_CASHIER = 4;

    use HasFactory;

    protected $table = 'staffs';

    protected $fillable = [
        'fullname',
        'birthday',
        'address',
        'phone',
        'email',
        'position',
        'status',
    ];
}
