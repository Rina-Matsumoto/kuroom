<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;
    
    public function comments()   
    {
        return $this->hasMany(Comment::class);  
    }
    
    public function users()   
    {
        return $this->hasMany(User::class);  
    }
}
