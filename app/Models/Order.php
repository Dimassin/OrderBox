<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['name', 'status', 'total_price', 'product_id', 'comment'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
