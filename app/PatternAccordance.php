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

    public function getPartSideOneAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = PatternOption::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }
    public function getPartSideTwoAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = PatternOption::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }
    public function getPartSideThreeAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = PatternOption::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }
    public function getPartSideFourAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = PatternOption::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }

    public function getPartEdgeOneAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = PatternOption::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }
    public function getPartEdgeTwoAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = PatternOption::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }
    public function getPartEdgeThreeAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = PatternOption::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }
    public function getPartEdgeFourAttribute($value){
        $arrays  = json_decode($value);
        $result = [];
        foreach ($arrays as $array){
            $model = PatternOption::find($array);
            $result[$model->id] = $model->name;
        }
        return $result;
    }


    public function setEdgeOneAttribute($value){ $this->attributes['edge_one'] = json_encode($value); }
    public function setEdgeTwoAttribute($value){ $this->attributes['edge_two'] = json_encode($value); }
    public function setEdgeThreeAttribute($value){ $this->attributes['edge_three'] = json_encode($value); }
    public function setEdgeFourAttribute($value){ $this->attributes['edge_four'] = json_encode($value); }
    public function setPartSideOneAttribute($value){$this->attributes['part_side_one'] = json_encode($value);}
    public function setPartSideTwoAttribute($value){$this->attributes['part_side_two'] = json_encode($value);}
    public function setPartSideThreeAttribute($value){$this->attributes['part_side_three'] = json_encode($value);}
    public function setPartSideFourAttribute($value){$this->attributes['part_side_four'] = json_encode($value);}
    public function setPartEdgeOneAttribute($value){$this->attributes['part_edge_one'] = json_encode($value);}
    public function setPartEdgeTwoAttribute($value){$this->attributes['part_edge_two'] = json_encode($value);}
    public function setPartEdgeThreeAttribute($value){$this->attributes['part_edge_three'] = json_encode($value);}
    public function setPartEdgeFourAttribute($value){$this->attributes['part_edge_four'] = json_encode($value);}

    public function thickness(){ return $this->belongsTo('App\Thickness'); }
    public function blankType(){ return $this->belongsTo('App\BlankType'); }
    public function nip(){ return $this->belongsTo('App\Nip'); }

}
