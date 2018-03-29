<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

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

    protected $fillable = ['name','code','image','thumb'];

    protected $casts = [
        'image' => 'image',
    ];

    public function decorCategory(){
        return $this->belongsTo('App\DecorCategory');
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }

    public function blankTypes()
    {
        return $this->belongsToMany('App\BlankType');
    }

    public function getUploadSettings()
    {
        return [
            'image' => [],
        ];
    }

    public function setImageAttribute($file = null)
    {
        if (is_null($file)) {
            return;
        }

        $original = Image::make($file);
        $thumb = Image::make($file);

        $thumb->crop(150, 150);

        $original->save($file);
        $thumb->save(str_replace('.','-thumb.',$file));

        $this->thumb = str_replace('.','-thumb.',$file);
        $this->attributes['image'] =  $file;
    }

    public static function getList()
    {
        $result = [];
        $lists = Decor::all();
        $result[0] = "All";
        foreach ($lists as $list){ $result[intval($list->id) + 1] = $list->name; }
        return $result;
    }
}
