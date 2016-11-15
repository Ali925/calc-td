<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadyProduct extends Model
{
    public function blankType(){ return $this->belongsTo('App\BlankType'); }
    public function thickness(){ return $this->belongsTo('App\Thickness'); }
    public function form(){ return $this->belongsTo('App\Form'); }
    public function decorCategory(){ return $this->belongsTo('App\DecorCategory'); }
    public function decor(){ return $this->belongsTo('App\Decor'); }
    public function nip(){ return $this->belongsTo('App\Nip'); }

    public function euro(){ return $this->belongsTo('App\PatternOption', 'euro_id', 'id'); }
    public function standard(){ return $this->belongsTo('App\PatternOption', 'standard_id', 'id'); }
    public function bevel(){ return $this->belongsTo('App\PatternOption', 'bevel_id', 'id'); }
    public function radius(){ return $this->belongsTo('App\PatternOption', 'radius_id', 'id'); }

    public function edgeOne(){ return $this->belongsTo('App\EdgeCategory','edge_one', 'id'); }
    public function edgeTwo(){ return $this->belongsTo('App\EdgeCategory','edge_two', 'id'); }
    public function edgeThree(){ return $this->belongsTo('App\EdgeCategory','edge_three', 'id'); }
    public function edgeFour(){ return $this->belongsTo('App\EdgeCategory','edge_four', 'id'); }

    public function patternAccordance(){ return $this->belongsTo('App\PatternAccordance'); }
    public function wrapper(){ return $this->belongsTo('App\Wrapper'); }
    public function orders(){return $this->belongsToMany('App\Order');}

    public function scopeWithOrder($query, $contactId)
    {
        $query->whereHas('orders', function ($q) use ($contactId) {
            $q->where('order_id', $contactId);
        });
    }

}
