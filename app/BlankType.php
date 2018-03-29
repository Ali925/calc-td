<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BlankType
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $min_width
 * @property int $max_width
 * @property int $min_length
 * @property int $max_length
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Form[] $forms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Thickness[] $thicknesses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PatternAccordance[] $patternAccordance
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadyProduct[] $readyProduct
 * @method static \Illuminate\Database\Query\Builder|\App\BlankType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlankType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlankType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlankType whereMinWidth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlankType whereMaxWidth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlankType whereMinLength($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlankType whereMaxLength($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlankType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlankType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlankType extends Model
{
    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function forms()
    {
        return $this->belongsToMany('App\Form');
    }

    public function thicknesses()
    {
        return $this->belongsToMany('App\Thickness');
    }

    public function decors()
    {
        return $this->belongsToMany('App\Decor');
    }

    public function patternAccordance()
    {
        return $this->hasMany(PatternAccordance::class);
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }



    public static function getList()
    {
        $result = [];
        $lists = BlankType::all();
        $result[0] = "Все";
        foreach ($lists as $list){ $result[intval($list->id) + 1] = $list->name; }
        return $result;
    }
}
