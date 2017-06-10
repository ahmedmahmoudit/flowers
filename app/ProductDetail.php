<?php

namespace App;

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
    protected $dateFormat = 'd-m-Y';
    protected $localeStrings = ['description'];
    protected $guarded = [];

    /**
     * Get the product that belongs to detail.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
