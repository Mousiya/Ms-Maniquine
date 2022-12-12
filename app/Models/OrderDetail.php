<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table="order_details";

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function dress()
    {
        return $this->belongsTo(Dress::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class,'order_item_id');
    }
}
