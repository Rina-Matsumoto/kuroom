<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    
    public function posts()   
    {
        return $this->hasMany(Post::class);  
    }
    
    public function classrooms()   
    {
        return $this->hasMany(Classroom::class);  
    }
    
    public function userCampuses()   
    {
        return $this->belongsTo(UserCampus::class);  
    }
}
