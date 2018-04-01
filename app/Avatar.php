<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    //
    protected $uploads='/spree56/public/resources/images/avatar/';
//
//
    protected $fillable = ['name'];
//
//
//
    public function getNameAttribute($photo)
    {
        return $this->uploads . $photo;
    }
}
