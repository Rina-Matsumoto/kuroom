<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subject_name',
        'day_id',
        'time_id',
        'school_id',
        'campus_id'
    ];
    
    public function users()   
    {
        return $this->belongsTo(User::class);  
    }
}
