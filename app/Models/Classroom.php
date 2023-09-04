<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'classroom_name',
        'day_id',
        'time_id',
        'school_id',
        'campus_id'
    ];
    
    public function emptyRooms()   
    {
        return $this->hasMany(EmptyRoom::class);  
    }
    
    public function schools()   
    {
        return $this->belongsTo(School::class);  
    }
    
    public function campuses()   
    {
        return $this->belongsTo(Classroom::class);  
    }
    
    public function times()   
    {
        return $this->belongsTo(Time::class);  
    }
    
    public function admins()   
    {
        return $this->belongsTo(Admin::class);  
    }
    
    public function days()   
    {
        return $this->belongsTo(Day::class);  
    }
}