<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DecorCategory extends Model
{
    protected $fillable = ['name', 'coast'];

    public function decor(){
        return $this->hasMany('App\Decor');
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }

    public static function getList()
    {
        $result = [];
        $lists = DecorCategory::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
