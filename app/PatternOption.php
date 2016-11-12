<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternOption extends Model
{
    public function positions()
    {
        return $this->belongsToMany('App\PatternPosition');
    }

    public static function getList()
    {
        $result = [];
        $lists = PatternOption::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }
}
