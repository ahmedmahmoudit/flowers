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
                return $this->attributes['order_status'] = 'Pending';
                break;
            case '2':
                return $this->attributes['order_status'] = 'Shipped';
                break;
            case '3':
                return $this->attributes['order_status'] = 'Completed';
                break;
            case '4':
                return $this->attributes['order_status'] = 'Cancelled';
                break;
            default:
                return $this->attributes['order_status'] = 'Error!';
        }
    }

    //If product on sale will return sale price else will return price
//    public function getPriceOrSale()
//    {
//        if($this->orderDetails->is_sale)
//        {
//            if(Carbon::now()->between(Carbon::parse($this->orderDetails->start_sale_date), Carbon::parse($this->orderDetails->end_sale_date)))
//            {
//                return $this->orderDetails->sale_price;
//            }
//
//            return $this->orderDetails->price;
//        }
//
//        return $this->orderDetails->price;
//    }

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
}
