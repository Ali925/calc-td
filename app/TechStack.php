<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechStack extends Model
{
    protected $casts = [
        'file' => 'file', // or file | upload
    ];

    protected function getUploadFilename(\Illuminate\Http\UploadedFile $file)
    {
        return md5($this->id).'.'.$file->getClientOriginalExtension();
    }
}
