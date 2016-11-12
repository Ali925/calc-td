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

    public static function getList()
    {
        $result = [];
        $lists = Nip::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }
}
