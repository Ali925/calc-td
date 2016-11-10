<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlankType extends Model
{
    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function forms()
    {
        return $this->belongsToMany('App\Form');
    }

    public function thicknesses()
    {
        return $this->belongsToMany('App\Thickness');
    }
}
