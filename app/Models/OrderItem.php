<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'price',
        'quantity',
        'total_price',
    ];

    // Mỗi item thuộc về 1 đơn hàng
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Mỗi item gắn với 1 sản phẩm (nếu còn)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
