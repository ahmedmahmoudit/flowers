<?php

namespace App;

use App\Core\LocaleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;
    use LocaleTrait;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $localeStrings = ['name'];

    /**
     * Get the country that belongs to store.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * The stores that belong to the area.
     */
    public function stores()
    {
        return $this->belongsToMany('App\Store');
    }
}
