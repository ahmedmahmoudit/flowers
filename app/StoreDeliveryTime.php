<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreDeliveryTime extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    /**
     * Get the store that belongs to product.
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
