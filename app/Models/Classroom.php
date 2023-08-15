<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    
    public function emptyRooms()   
    {
        return $this->hasMany(EmptyRoom::class);  
    }
    
    public function schools()   
    {
        return $this->belongsTo(School::class);  
    }
    
    public function campuses()   
    {
        return $this->belongsTo(Classroom::class);  
    }
}
