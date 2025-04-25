<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'address',
        'status',
        'total_price',
    ];

    // Một đơn hàng có nhiều sản phẩm (order items)
    public function item()
    {
        return $this->hasOne(OrderItem::class);
    }

    // Nếu có liên kết với người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
