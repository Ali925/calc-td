<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlankType extends Model
{
    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function forms()
    {
        return $this->belongsToMany('App\Form');
    }

    public function thicknesses()
    {
        return $this->belongsToMany('App\Thickness');
    }

    public function patternAccordance()
    {
        return $this->hasMany(PatternAccordance::class);
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }

    public static function getList()
    {
        $result = [];
        $lists = BlankType::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }
}
