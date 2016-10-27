<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decor extends Model
{
    protected $fillable = ['name','code','image'];

    public function decorCategory(){
        return $this->belongsTo('App\DecorCategory');
    }
}
