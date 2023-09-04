<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    
    public function emptyRooms()   
    {
        return $this->hasMany(EmptyRoom::class);  
    }
    
    public function classrooms()   
    {
        return $this->hasMany(Classroom::class);  
    }
}
