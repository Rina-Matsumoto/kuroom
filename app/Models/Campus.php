<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    public $incrementing = false;
    
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
