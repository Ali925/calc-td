<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternAccordance extends Model
{

    public function thickness()
    {
        return $this->belongsTo('App\Thickness');
    }
    public function blankType()
    {
        return $this->belongsTo('App\BlankType');
    }
    public function nip()
    {
        return $this->belongsTo('App\Nip');
    }

    public function patternOptionSideOne()
    {
        return $this->belongsTo('App\PatternOption','part_side_one' ,'id');
    }

    public function patternOptionSideTwo()
    {
        return $this->belongsTo('App\PatternOption','part_side_two' ,'id');
    }

    public function patternOptionSideThree()
    {
        return $this->belongsTo('App\PatternOption','part_side_three' ,'id');
    }

    public function patternOptionSideFour()
    {
        return $this->belongsTo('App\PatternOption','part_side_four' ,'id');
    }

    public function patternOptionEdgeOne()
    {
        return $this->belongsTo('App\PatternOption','part_edge_one' ,'id');
    }

    public function patternOptionEdgeTwo()
    {
        return $this->belongsTo('App\PatternOption','part_edge_two' ,'id');
    }

    public function patternOptionEdgeThree()
    {
        return $this->belongsTo('App\PatternOption','part_edge_three' ,'id');
    }

    public function patternOptionEdgeFour()
    {
        return $this->belongsTo('App\PatternOption','part_edge_four' ,'id');
    }

    public function patternEdgeDecorsOne()
    {
        return $this->belongsToMany('App\EdgeCategory','edge_one_pivot');
    }

    public function patternEdgeDecorsTwo()
    {
        return $this->belongsToMany('App\EdgeCategory','edge_two_pivot');
    }

    public function patternEdgeDecorsThree()
    {
        return $this->belongsToMany('App\EdgeCategory','edge_three_pivot');
    }

    public function patternEdgeDecorsFour()
    {
        return $this->belongsToMany('App\EdgeCategory','edge_four_pivot');
    }

    public function form()
    {
        return $this->belongsTo('App\Form');
    }



}
