<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decor extends Model
{
    use \KodiComponents\Support\Upload;

    protected $fillable = ['name','code','image'];

    public function decorCategory(){
        return $this->belongsTo('App\DecorCategory');
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }



}
