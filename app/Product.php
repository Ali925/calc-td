<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function blankType()
    {
        return $this->belongsTo('App\BlankType');
    }

    public function decorCategory()
    {
        return $this->belongsTo('App\DecorCategory');
    }

    public function nip()
    {
        return $this->belongsTo('App\Nip');
    }

    public function thickness()
    {
        return $this->belongsTo('App\Thickness');
    }
}
