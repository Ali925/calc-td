<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EdgeDecor extends Model
{
    public function edgeCategory(){
        return $this->belongsTo('App\EdgeCategory');
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

}
