<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternAccordance extends Model
{

    public function getEdgeOneAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = EdgeCategory::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }

    public function getEdgeTwoAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = EdgeCategory::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }

    public function getEdgeThreeAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = EdgeCategory::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }

    public function getEdgeFourAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = EdgeCategory::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }


    public function setEdgeOneAttribute($value){ $this->attributes['edge_one'] = json_encode($value); }
    public function setEdgeTwoAttribute($value){ $this->attributes['edge_two'] = json_encode($value); }
    public function setEdgeThreeAttribute($value){ $this->attributes['edge_three'] = json_encode($value); }
    public function setEdgeFourAttribute($value){ $this->attributes['edge_four'] = json_encode($value); }

    public function thickness(){ return $this->belongsTo('App\Thickness'); }
    public function blankType(){ return $this->belongsTo('App\BlankType'); }
    public function nip(){ return $this->belongsTo('App\Nip'); }

    public function patternOptionSideOne(){
        return $this->belongsTo('App\PatternOption','part_side_one' ,'id');
    }

    public function patternOptionSideTwo(){
        return $this->belongsTo('App\PatternOption','part_side_two' ,'id');
    }

    public function patternOptionSideThree(){
        return $this->belongsTo('App\PatternOption','part_side_three' ,'id');
    }

    public function patternOptionSideFour(){
        return $this->belongsTo('App\PatternOption','part_side_four' ,'id');
    }

    public function patternOptionEdgeOne(){
        return $this->belongsTo('App\PatternOption','part_edge_one' ,'id');
    }

    public function patternOptionEdgeTwo(){
        return $this->belongsTo('App\PatternOption','part_edge_two' ,'id');
    }

    public function patternOptionEdgeThree(){
        return $this->belongsTo('App\PatternOption','part_edge_three' ,'id');
    }

    public function patternOptionEdgeFour(){
        return $this->belongsTo('App\PatternOption','part_edge_four' ,'id');
    }

}
