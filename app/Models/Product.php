<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'category_id'];
    protected $casts = ['price' => 'decimal:2'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
