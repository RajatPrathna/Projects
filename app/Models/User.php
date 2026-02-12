<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'phone_number',
        'address',
        'DOB',
        'gender',
        'password',
        'is_admin',
        ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function cart(){
        return $this->hasMany(cart::class,'user_id','id');
    }
}

 