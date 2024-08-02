<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'phonenumber',
        'password',
        'role',
        'activate',
        'last_login',
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function grower()
    {
        return $this->hasOne(Grower::class, 'person_id');
    }
    public function breeder()
    {
        return $this->hasOne(Breeder::class, 'person_id');
    }
}