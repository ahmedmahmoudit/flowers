<?php

namespace App;

use Carbon\Carbon;
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
    protected $dates = ['deleted_at', 'expiry_date'];
    protected $guarded = ['id'];

    public function setExpiryDateAttribute( $value ) {
        $this->attributes['expiry_date'] = (new Carbon($value))->format('Y-m-d');
    }

    public function value( $totalAmount, $percentage ) {
        return ($totalAmount*$percentage)/100;
    }

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

    public function hasExpired()
    {
        return Carbon::now()->toDateString() > $this->attributes['expiry_date'] ;
    }

    public function hasEnoughQuantity()
    {
        return $this->attributes['quantity_left'] > 0;
    }

    public function scopeActive()
    {
        return $this->active == 1;
    }



}
