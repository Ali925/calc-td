<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatternOption extends Model
{
    public function positions()
    {
        return $this->belongsToMany('App\PatternPosition');
    }

    public function patternAccordance()
    {
        return $this->hasMany('App\PatternAccordance');
    }

    public function nips()
    {
        return $this->belongsToMany('App\Nip');
    }

    public static function getList()
    {
        $result = [];
        $lists = PatternOption::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }

    protected $casts = ['image' => 'image'];

    public function getUploadSettings()
    {
        return [
            'image' => [
                'orientate' => [],
                'resize' => [600, null, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                }]
            ],
        ];
    }

    protected function getUploadFilename(\Illuminate\Http\UploadedFile $file)
    {
        return md5($this->id).'.'.$file->getClientOriginalExtension();
    }

    public function form_edge_1(){ return $this->belongsToMany(Form::class,'form_edge_1');}
    public function form_edge_2(){ return $this->belongsToMany(Form::class,'form_edge_2');}
    public function form_edge_3(){ return $this->belongsToMany(Form::class,'form_edge_3');}
    public function form_edge_4(){ return $this->belongsToMany(Form::class,'form_edge_4');}

    public function form_side_1(){ return $this->belongsToMany(Form::class,'form_side_1');}
    public function form_side_2(){ return $this->belongsToMany(Form::class,'form_side_2');}
    public function form_side_3(){ return $this->belongsToMany(Form::class,'form_side_3');}
    public function form_side_4(){ return $this->belongsToMany(Form::class,'form_side_4');}
}
