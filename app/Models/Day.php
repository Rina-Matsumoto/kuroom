<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    public $incrementing = false;
    
     public function emptyRooms()
    {
        return $this->hasMany(EmptyRoom::class);
    }
}
