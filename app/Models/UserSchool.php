<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSchool extends Model
{
    use HasFactory;
    
    public function schools()   
    {
        return $this->hasMany(School::class);  
    }
    
    public function users()   
    {
        return $this->hasMany(User::class);  
    }
}
