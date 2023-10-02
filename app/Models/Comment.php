<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'comment',
        'user_identifier',
        'classroom_id'
    ];
    
    public function emptyRooms()   
    {
        return $this->belongsTo(EmptyRoom::class);  
    }
    
    public function userComments()   
    {
        return $this->belongsTo(UserComment::class);  
    }
    
    public function users()   
    {
        return $this->belongsTo(User::class);  
    }
    
    public function classrooms()   
    {
        return $this->belongsTo(Classroom::class);  
    }
}
