<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternPosition extends Model
{
    public function pattern_options()
    {
        return $this->belongsToMany('App\PatternOption');
    }
}
