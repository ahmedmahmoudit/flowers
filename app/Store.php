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

    protected $guarded = ['id'];

    protected $localeStrings = ['name','slug'];

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

    public function productsIds()
    {
        return $this->hasMany('App\Product')->select(array('id'));
    }

    public function deliveryTimes()
    {
        return $this->hasMany('App\StoreDeliveryTime');
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

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('order_status');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved',1);
    }
}
