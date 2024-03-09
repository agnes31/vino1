<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WineRoom;

use App\Models\User;

class Cellar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function getCellarInWineRoom()
    {
        return $this->hasMany(WineRoom::class, 'cellar_id');
    }

    public function getBottlesInWineRoom()
    {
        return $this->belongsToMany(Bottle::class, 'wine_rooms', 'cellar_id', 'saq_bottle_id')->withPivot('quantity', 'id')->orderBy('name');
    }
}
