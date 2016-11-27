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
            'pattern_options' => [
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
}
