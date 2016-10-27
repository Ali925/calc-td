<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DecorCategory extends Model
{
    protected $fillable = ['name', 'coast'];

    public function decor(){
        return $this->hasMany('App\Decor');
    }
}
