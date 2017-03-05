<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function RoleName(){
        switch ($this->role){
            case 1:
                return 'Administrator';
                break;
            case 2:
                return 'Manager';
                break;
            default:
                return '';
                break;
        }
    }

    public function isAdmin(){
        return $this->role === 1;
    }

    public function isManager(){
        return $this->role === 2;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
