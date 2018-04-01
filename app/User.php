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
        'firstname','lastname', 'email', 'password','is_active','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this ->belongsTo('App\Role');
    }

    public function avatar()
    {
        return $this ->belongsTo('App\Avatar');
    }



    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    public function isAdmin()
    {
        if($this->role->name == 'Administrator'){

            return true;
        }
       return false;

    }

    public function isAuthor()
    {
        if($this->role->name == 'Author'){

            return true;
        }
        return false;

    }
}