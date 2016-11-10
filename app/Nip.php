<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nip extends Model
{
    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function thicknesses()
    {
        return $this->belongsToMany('App\Thickness');
    }
}
