<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thickness extends Model
{
    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function blankTypes()
    {
        return $this->belongsToMany('App\BlankType');
    }

    public function nips()
    {
        return $this->belongsToMany('App\Nip');
    }
}
