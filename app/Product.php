<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function forms()
    {
        return $this->belongsToMany('App\Form','form_product');
    }

    public function nips()
    {
        return $this->belongsToMany('App\Nip');
    }

    public function thicknesses()
    {
        return $this->belongsToMany('App\Thickness');
    }
}
