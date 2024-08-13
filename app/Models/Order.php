<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number',
        'user_id',
        'product_id',
        'total_amount',
        'quantity',
        'payment_method',
        'payment_status',
        'status',
        'first_name',
        'last_name',
        'email',
        'phone',
        'post_code',
        'address',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\Product','id','user_id');
    }
    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public static function countNewReceivedOrder(){
        $data = Order::where('status', 'new')->count();
        return $data;
    }
    public static function countProcessingOrder(){
        $data = Order::where('status', 'process')->count();
        return $data;
    }
    public static function countDeliveredOrder(){
        $data = Order::where('status', 'delivered')->count();
        return $data;
    }
    public static function countCancelledOrder(){
        $data = Order::where('status', 'cancel')->count();
        return $data;
    }
}
