<?php

namespace App;

use Cache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Product extends BaseModel
{
    use SoftDeletes;


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $localeStrings = ['name', 'slug'];

    protected $guarded = ['id'];

    public $deliveryTimes = [];

    public function __construct()
    {
        parent::__construct();
        $this->deliveryTimes = ['2pm' => __('morning 9am-2pm'), '6pm' => __('afternoon 2pm-6pm'), '10pm' => __('evening 6pm-10pm')];
    }

    /**
     * Get the store that belongs to product.
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    /**
     * Get the Order Items.
     */
    public function orderItem()
    {
        return $this->hasMany('App\OrderDetail');
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

    public function scopeChildrenCategoryProducts($query, $ids)
    {
        return $query->join('category_product', function ($join) use ($ids) {
            $join->on('category_product.product_id', '=', 'products.id')
                ->whereIn('category_product.category_id', $ids)//                ->where('articles.published',1)
            ;
        });
    }

    public function scopeByStore($query)
    {
        return $query->where('store_id', Auth::user()->store->id);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeApproved($query)
    {
        return $query->leftJoin('stores', 'products.store_id', 'stores.id')
            ->where('products.id', $this->id)
            ->where('stores.is_approved', 1);
    }
}
