<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternPosition extends Model
{
    public function options()
    {
        return $this->belongsToMany('App\PatternOption');
    }

    public static function getList()
    {
        $result = [];
        $lists = PatternPosition::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }
}
