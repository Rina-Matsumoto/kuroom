<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCampus extends Model
{
    use HasFactory;
    
    public function campuses()   
    {
        return $this->belongsTo(Campus::class);  
    }
    
    public function users()   
    {
        return $this->hasMany(User::class);  
    }
}
