<?php

namespace App;

use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $localeStrings = ['name','slug'];

    protected $guarded = ['id'];

    /**
     * Get the store that belongs to product.
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * Get productImages associated with the product.
     */
    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }

    /**
     * The userLikes that belong to the Product.
     */
    public function userLikes()
    {
        return $this->belongsToMany('App\User', 'user_likes');
    }

    public function detail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function getPrice()
    {
        $countries  = collect(Cache::get('countries'));
        $country = $countries->first(function($country) {
            return $country['id'] === $this->store->country_id;
        });
        return $this->detail->price .' '. $country['currency_'.app()->getLocale()];
    }

}
