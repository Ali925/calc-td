<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EdgeCategory extends Model
{
    public function edgeDecor(){
        return $this->hasMany('App\EdgeDecor');
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

    public function patternAccordanceEdgeOne()
    {
        return $this->belongsToMany('App\PatternAccordance','edge_one_pivot');
    }

    public function patternAccordanceEdgeTwo()
    {
        return $this->belongsToMany('App\PatternAccordance','edge_two_pivot');
    }

    public function patternAccordanceEdgeThree()
    {
        return $this->belongsToMany('App\PatternAccordance','edge_three_pivot');
    }

    public function patternAccordanceEdgeFour()
    {
        return $this->belongsToMany('App\PatternAccordance','edge_four_pivot');
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }
}
