<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternOption extends Model
{
    public function pattern_positions()
    {
        return $this->belongsToMany('App\PatternPosition');
    }
}
