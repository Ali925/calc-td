<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nip extends Model
{
    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function thicknesses()
    {
        return $this->belongsToMany('App\Thickness');
    }

    public function patternAccordance()
    {
        return $this->hasMany(PatternAccordance::class);
    }

    public function patternPositions()
    {
        return $this->belongsToMany('App\PatternPosition');
    }

    public static function getList()
    {
        $result = [];
        $lists = Nip::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }

    public function form()
    {
        return $this->belongsToMany(Form::class);
    }
}
