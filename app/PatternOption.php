<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternOption extends Model
{
    public function positions()
    {
        return $this->belongsToMany('App\PatternPosition');
    }
}
