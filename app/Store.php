<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    /**
     * Get the country that belongs to store.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get products associated with the store.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * The areas that belong to the store.
     */
    public function areas()
    {
        return $this->belongsToMany('App\Area');
    }

    /**
     * The coupons that belong to the store.
     */
    public function coupons()
    {
        return $this->belongsToMany('App\Coupon');
    }
}
