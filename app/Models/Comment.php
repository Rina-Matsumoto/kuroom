<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public function emptyRooms()   
    {
        return $this->belongsTo(EmptyRoom::class);  
    }
    
    public function userComments()   
    {
        return $this->belongsTo(UserComment::class);  
    }
}
