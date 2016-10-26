<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product','form_product');
    }
}
