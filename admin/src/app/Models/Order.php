<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_code',
        'staff_id',
        'customer_id',
        'discount',
        'total_price',
        'customer_paid',
        'refunds',
        'order_date',
        'note',
    ];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
