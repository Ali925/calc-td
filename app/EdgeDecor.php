<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\EdgeDecor
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property mixed $image
 * @property int $edge_category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $thumb
 * @property-read \App\EdgeCategory $edgeCategory
 * @property-read \App\ReadyProduct $readyProduct
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeDecor whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeDecor whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeDecor whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeDecor whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeDecor whereEdgeCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeDecor whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeDecor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeDecor whereThumb($value)
 * @mixin \Eloquent
 */
class EdgeDecor extends Model
{
    public function edgeCategory(){
        return $this->belongsTo('App\EdgeCategory');
    }

    public function readyProduct(){
        return $this->belongsTo('App\ReadyProduct');
    }

    protected $casts = [
        'image' => 'image',
        'thumb' => 'image',
    ];

    public function getUploadSettings()
    {
        return [
            'image' => [],
            'thumb' => [
                'crop' => [150, 150],
            ],
        ];
    }

    public function setUploadImageAttribute($file = null)
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
        $this->image = $file;
    }

}
