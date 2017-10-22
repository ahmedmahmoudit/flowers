<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Product
{
    use SoftDeletes;
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the order that belongs to orderDetail.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

    public function getPriceWithCurrency()
    {
        $currency = $this->getProductCurrency();
        $price = $this->sale_price . ' '.$currency;
        return $price;
    }

    public function getProductCurrency()
    {
        $productCountry = $this->order->country;
        $productCountry->currency_en;
        return $productCountry->currency_en;
    }

    public function getDeliveryTime()
    {
        $deliveryTimes = $this->deliveryTimes;
        return $deliveryTimes[$this->delivery_time];
    }

    public function deliveryTime()
    {
        return $this->belongsTo(DeliveryTime::class,'delivery_time','id');
    }
}
