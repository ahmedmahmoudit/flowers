<?php

namespace App;

use App\Core\LocaleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use SoftDeletes;
//    use LocaleTrait;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $localeStrings = ['name','slug'];

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
     * Get the productDetail record associated with the product.
     */
    public function productDetail()
    {
        return $this->hasOne('App\ProductDetail');
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
}
