<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EdgeCategory extends Model
{
    public function edgeDecor(){
        return $this->belongsToMany('App\EdgeDecor');
    }
}
