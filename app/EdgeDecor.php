<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EdgeDecor extends Model
{
    public function edgeCategory(){
        return $this->belongsTo('App\EdgeCategory');
    }
}
