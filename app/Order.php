<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_num', 'order_amount', 'customer_id', 'status'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function readyProducts()
    {
        return $this->belongsToMany('App\ReadyProduct');
    }


}
