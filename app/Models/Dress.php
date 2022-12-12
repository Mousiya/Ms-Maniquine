<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dress extends Model
{
    use HasFactory;
    protected $table="dresses";

    public function orderItem()
    {
        return $this->hasMany(OrderDetail::class,'dress_id');
    }
}
