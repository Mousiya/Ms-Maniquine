<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DressSize extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    protected $table='dress_sizes';

    public function dress()
    {
        return $this->belongsTo(Dress::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
   
    public function size()
    {
        return $this->belongsTo(Size::class);
    }


}
