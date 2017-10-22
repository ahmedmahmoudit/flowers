<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryTime extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    protected $localeStrings = ['name'];

    /**
     * Get the store that belongs to product.
     */

    public function products() {
        return $this->belongsToMany(Product::class,'delivery_times');
    }

}
