<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Decor
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $image
 * @property int $decor_category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $thumb
 * @property-read \App\DecorCategory $decorCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadyProduct[] $readyProduct
 * @method static \Illuminate\Database\Query\Builder|\App\Decor whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Decor whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Decor whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Decor whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Decor whereDecorCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Decor whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Decor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Decor whereThumb($value)
 * @mixin \Eloquent
 */
class Decor extends Model
{
    use \KodiComponents\Support\Upload;

    protected $fillable = ['name','code','image'];

    public function decorCategory(){
        return $this->belongsTo('App\DecorCategory');
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }

    protected function getUploadFilename(\Illuminate\Http\UploadedFile $file)
    {
        return md5($this->id).'.'.$file->getClientOriginalExtension();
    }



}
