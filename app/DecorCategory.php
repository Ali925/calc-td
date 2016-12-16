<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DecorCategory
 *
 * @property int $id
 * @property string $name
 * @property int $coast
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Decor[] $decor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadyProduct[] $readyProduct
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $product
 * @method static \Illuminate\Database\Query\Builder|\App\DecorCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DecorCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DecorCategory whereCoast($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DecorCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DecorCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DecorCategory extends Model
{
    protected $fillable = ['name', 'coast'];

    public function decor(){
        return $this->hasMany('App\Decor');
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }

    public static function getList()
    {
        $result = [];
        $lists = DecorCategory::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
