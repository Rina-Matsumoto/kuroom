<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmptyRoom extends Model
{
    use HasFactory;
    
    public function days()   
    {
        return $this->belongsTo(Day::class);  
    }
    
    public function posts()   
    {
        return $this->belongsTo(Classroom::class);  
    }
    
    public function comments()   
    {
        return $this->hasMany(Comment::class);  
    }
    
    public function reservations()   
    {
        return $this->belongsTo(Reservation::class);  
    }
}
