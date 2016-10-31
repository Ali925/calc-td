<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product','form_product');
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
        ];
    }

    protected function getUploadFilename(\Illuminate\Http\UploadedFile $file)
    {
        return md5($this->id).'.'.$file->getClientOriginalExtension();
    }
}
