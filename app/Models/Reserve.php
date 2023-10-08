<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'reserve_date',
        'day_id',
        'time_id',
        'user_name',
        'user_email',
        'text',
        'admin_id',
        'user_id',
        'classroom_id'
    ];
    
    public function emptyRooms()   
    {
        return $this->hasMany(EmptyRoom::class);  
    }
    
    public function users()   
    {
        return $this->hasMany(User::class);  
    }
}
