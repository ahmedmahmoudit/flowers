<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    /**
     * Get the user that belongs to order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get orderDetails "order products" associated with the order.
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    /**
     * Get the coupon that belongs to order.
     */
    public function coupon()
    {
        return $this->belongsTo('App\Coupon');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);

    }
}
