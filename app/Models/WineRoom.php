<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WineRoom extends Model
{
    use HasFactory;

    protected $table = 'wine_rooms';

    protected $fillable = [
        'quantity',
        'cellar_id',
        'saq_bottle_id',
    ];

    public function bottle()
    {
        return $this->belongsTo(Bottle::class, 'saq_bottle_id');
    }

    public function cellar()
    {
        return $this->belongsTo(Cellar::class, 'cellar_id');
    }
}


