<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternPosition extends Model
{
    public function options()
    {
        return $this->belongsToMany('App\PatternOption');
    }
}
