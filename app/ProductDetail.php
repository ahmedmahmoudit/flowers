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
    protected $dates = ['deleted_at'];
    protected $localeStrings = ['description'];


    /**
     * Get the product that belongs to detail.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
