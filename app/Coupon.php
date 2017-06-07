<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The stores that belong to the coupon.
     */
    public function stores()
    {
        return $this->belongsToMany('App\Store');
    }

    /**
     * Get orders associated with the coupon.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
