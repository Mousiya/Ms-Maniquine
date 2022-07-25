<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $table="works";

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
