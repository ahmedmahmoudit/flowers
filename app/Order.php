<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Order extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'delivery_date'];
    protected $guarded = ['id'];

    public function orderStatusCast( $value )
    {

        switch ($value)
        {
            case '-1':
                return $this->attributes['order_status'] = __('Pending');
                break;
            case '1':
                return $this->attributes['order_status'] = __('Pending');
                break;
            case '2':
                return $this->attributes['order_status'] = __('Shipped');
                break;
            case '3':
                return $this->attributes['order_status'] = __('Completed');
                break;
            case '4':
                return $this->attributes['order_status'] = __('Cancelled');
                break;
            default:
                return $this->attributes['order_status'] = 'Unknown';
        }
    }

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

    // just get any one order detail, to show as excerpt in order details page
    public function detailExcerpt()
    {
        return $this->hasOne(OrderDetail::class);
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

    public function stores()
    {
        return $this->belongsToMany('App\Store')->withPivot('order_status');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getOrderStatusValueAttribute()
    {
        return $this->orderStatusCast($this->order_status);
    }

    public function scopeCaptured($q)
    {
        return $q->where('captured_status',1);
    }

}
