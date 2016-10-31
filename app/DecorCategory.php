<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DecorCategory extends Model
{
    protected $fillable = ['name', 'coast'];

    public function decor(){
        return $this->hasMany('App\Decor');
    }

    public static function getList()
    {
        $result = [];
        $lists = DecorCategory::all();
        foreach ($lists as $list){ $result[] = $list->name; }
        return $result;
    }
}
