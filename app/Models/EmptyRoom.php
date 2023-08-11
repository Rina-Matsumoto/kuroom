<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmptyRoom extends Model
{
    use HasFactory;
    
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    
     public function day()
    {
        return $this->belongsTo(Day::class);
    }
    
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
    
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
