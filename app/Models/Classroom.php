<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    public $incrementing = false;
    
    public function emptyRooms()
    {
        return $this->hasMany(EmptyRoom::class);
    }
    
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
}
