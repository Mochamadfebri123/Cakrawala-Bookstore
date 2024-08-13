<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable=['user_id','product_id','order_id','quantity','amount','price','status'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}