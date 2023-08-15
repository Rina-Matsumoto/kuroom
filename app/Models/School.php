<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    
    public function classrooms()   
    {
        return $this->hasMany(Classroom::class);  
    }
    
    public function userSchools()   
    {
        return $this->belongsTo(UserSchool::class);  
    }
}
