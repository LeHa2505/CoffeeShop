<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public const STATUS_BLOCKED = 0;
    public const STATUS_ACTIVE = 1;
    public const FAVORITE = 1;
    public const NOT_FAVORITE = 0;

    protected $fillable = [
        'product_code',
        'title',
        'link_image',
        'description',
        'price',
        'reduced_price',
        'category_id',
        'favorite',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
