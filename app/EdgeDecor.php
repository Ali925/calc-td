<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EdgeDecor extends Model
{
    public function edgeCategory(){
        return $this->belongsTo('App\EdgeCategory');
    }

    public function readyProduct(){
        return $this->belongsTo('App\ReadyProduct');
    }

    protected $casts = ['image' => 'image'];

    protected function getUploadFilename(\Illuminate\Http\UploadedFile $file)
    {
        return md5($this->id).'.'.$file->getClientOriginalExtension();
    }

}
