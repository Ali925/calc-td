<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\EdgeCategory
 *
 * @property int $id
 * @property string $name
 * @property int $coast
 * @property bool $egoist
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\EdgeDecor[] $edgeDecor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PatternAccordance[] $patternAccordance
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PatternAccordance[] $patternAccordanceEdgeOne
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PatternAccordance[] $patternAccordanceEdgeTwo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PatternAccordance[] $patternAccordanceEdgeThree
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PatternAccordance[] $patternAccordanceEdgeFour
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadyProduct[] $readyProduct
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeCategory whereCoast($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeCategory whereEgoist($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EdgeCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EdgeCategory extends Model
{
    public function edgeDecor(){
        return $this->hasMany('App\EdgeDecor');
    }

    public static function getList()
    {
        $result = [];
        $lists = EdgeCategory::all();
        foreach ($lists as $list){ $result[$list->id] = $list->name; }
        return $result;
    }

    public function patternAccordance()
    {
        return $this->hasMany(PatternAccordance::class);
    }

    public function patternAccordanceEdgeOne()
    {
        return $this->belongsToMany('App\PatternAccordance','edge_one_pivot');
    }

    public function patternAccordanceEdgeTwo()
    {
        return $this->belongsToMany('App\PatternAccordance','edge_two_pivot');
    }

    public function patternAccordanceEdgeThree()
    {
        return $this->belongsToMany('App\PatternAccordance','edge_three_pivot');
    }

    public function patternAccordanceEdgeFour()
    {
        return $this->belongsToMany('App\PatternAccordance','edge_four_pivot');
    }

    public function readyProduct()
    {
        return $this->hasMany('App\ReadyProduct');
    }
}
