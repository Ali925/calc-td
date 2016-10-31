<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decor extends Model
{
    use \KodiComponents\Support\Upload;

    protected $casts = ['image' => 'image'];

    protected $fillable = ['name','code','image'];

    public function decorCategory(){
        return $this->belongsTo('App\DecorCategory');
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
