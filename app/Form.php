<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

    protected $casts = [
        'image' => 'image',
        'pattern_image' => 'image',
    ];

    public function blankTypes()
    {
        return $this->belongsToMany('App\BlankType');
    }

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

            'pattern_image' => [
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

    public function patternAccordance()
    {
        return $this->hasMany('App\PattenAccordance');
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }

    public function option_edge_1(){return $this->belongsToMany(PatternOption::class,'form_edge_1');}
    public function option_edge_2(){return $this->belongsToMany(PatternOption::class,'form_edge_2');}
    public function option_edge_3(){return $this->belongsToMany(PatternOption::class,'form_edge_3');}
    public function option_edge_4(){return $this->belongsToMany(PatternOption::class,'form_edge_4');}

    public function option_side_1(){return $this->belongsToMany(PatternOption::class,'form_side_1');}
    public function option_side_2(){return $this->belongsToMany(PatternOption::class,'form_side_2');}
    public function option_side_3(){return $this->belongsToMany(PatternOption::class,'form_side_3');}
    public function option_side_4(){return $this->belongsToMany(PatternOption::class,'form_side_4');}
}
