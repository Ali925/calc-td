<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternAccordance extends Model
{

    public function getEdgeOneAttribute($value){ return json_decode($value); }
    public function getEdgeTwoAttribute($value){ return json_decode($value); }
    public function getEdgeThreeAttribute($value){ return json_decode($value); }
    public function getEdgeFourAttribute($value){ return json_decode($value); }

    public function setEdgeOneAttribute($value){ $this->attributes['edge_one'] = json_encode($value); }
    public function setEdgeTwoAttribute($value){ $this->attributes['edge_two'] = json_encode($value); }
    public function setEdgeThreeAttribute($value){ $this->attributes['edge_three'] = json_encode($value); }
    public function setEdgeFourAttribute($value){ $this->attributes['edge_four'] = json_encode($value); }

}
