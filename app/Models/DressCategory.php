<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DressCategory extends Model
{
    use HasFactory;
    protected $table='dress_categories';

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function dress()
    {
        return $this->belongsTo(Dress::class,'dress_id');
    }
}
