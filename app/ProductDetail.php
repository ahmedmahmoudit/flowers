<?php

namespace App;

use Cache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'start_sale_date', 'end_sale_date'];
//    protected $dateFormat = 'd-m-Y';
    protected $localeStrings = ['description'];
    protected $guarded = [];
    protected $appends = ['final_price'];

    /**
     * Get the product that belongs to detail.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function setStartSaleDateAttribute( $value ) {
        $this->attributes['start_sale_date'] = (new Carbon($value))->format('d-m-y');
    }

    public function setEndSaleDateAttribute( $value ) {
        $this->attributes['end_sale_date'] = (new Carbon($value))->format('d-m-y');
    }

//    public function getPriceAttribute()
//    {
//        return $this->price;
//    }
//
//    public function getSalePriceAttribute()
//    {
//        return $this->sale_price;
//    }

    public function getPriceWithCurrency()
    {
        $productCountry = $this->getProductCountry();
        $price = $this->price;
        return  $price.' '. $productCountry['currency_'.app()->getLocale()];
    }

    public function getSalePriceWithCurrency()
    {
        $productCountry = $this->getProductCountry();
        $price = $this->sale_price;
        return  $price.' '. $productCountry['currency_'.app()->getLocale()];
    }

    public function getFinalPriceAttribute()
    {
        return $this->is_sale ? $this->sale_price : $this->price;
    }

    public function getFinalPriceWithCurrency()
    {
        $productCountry = $this->getProductCountry();
        return  $this->final_price .' '. $productCountry['currency_'.app()->getLocale()];
    }

    /**
     * @return mixed
     */
    public function getProductCountry(): array
    {
        $countries = collect(Cache::get('countries'));
        $productCountry = $countries->first(function ($country) {
            return $country['id'] === $this->product->store->country_id;
        });
        return $productCountry;
    }

}
