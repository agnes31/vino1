<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bottle extends Model
{
    use HasFactory;

    protected $table = 'saq_bottles';

    protected $fillable = [
        'id',
        'name',
        'image',
        'code_saq',
        'country',
        'description',
        'price',
        'url_saq',
        'format',
        'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
