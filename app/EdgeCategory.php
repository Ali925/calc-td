<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EdgeCategory extends Model
{
    public function edgeDecor(){
        return $this->belongsToMany('App\EdgeDecor');
    }

    public static function getList()
    {
        $result = [];
        $lists = EdgeCategory::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }

    public function patternAccordance()
    {
        return $this->hasMany(PatternAccordance::class);
    }
}
