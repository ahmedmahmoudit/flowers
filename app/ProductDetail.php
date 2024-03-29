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
    protected $localeStrings = ['description'];
    protected $guarded = ['id'];
    protected $appends = ['final_price','in_stock'];

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
        return  $this->price .' '. $productCountry['currency_'.app()->getLocale()];
    }

    /**
     * @return mixed
     */
    public function getProductCountry(): array
    {
        $country = session()->get('selectedCountry');
        return $country;
    }
//    public function getProductCountry(): array
//    {
//        $countries = collect(Cache::get('countries'));
//        $productCountry = $countries->first(function ($country) {
//
//
//            if (!$this->relationLoaded('product')) {
//                $this->load('product.store');
//            }
//
//            $product = $this->getRelation('product');
//
//            return $country['id'] === $product->store->country_id;
//        });
//
//        return $productCountry;
//    }

    public function getInStockAttribute()
    {
        return $this->quantity > 0 ;
    }

}
