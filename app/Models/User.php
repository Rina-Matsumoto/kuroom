<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function reservations()   
    {
        return $this->belongsTo(Reservation::class);  
    }
    
    public function userComments()   
    {
        return $this->belongsTo(UserComment::class);  
    }
    
    public function userSchools()   
    {
        return $this->belongsTo(UserSchool::class);  
    }
    
    public function userCampuses()   
    {
        return $this->belongsTo(UserCampus::class);  
    }
    
    public function subjects()   
    {
        return $this->hasMany(Subject::class);  
    }
    
    public function comments()   
    {
        return $this->hasMany(Comment::class);  
    }
    
    public function admins()   
    {
        return $this->belongsTo(Admin::class);  
    }
    
    public function reserves()   
    {
        return $this->belongsTo(Reserve::class);  
    }
}
