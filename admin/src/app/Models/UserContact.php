<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserContact extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'feedback',
        'option',
        'status',
    ];

    protected $table = 'user_contacts';
}
