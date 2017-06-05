<?php

namespace App;

use App\Core\LocaleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    use LocaleTrait;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    protected $localeStrings = ['name'];

    protected $with = ['areas'];

    /**
     * Get stores associated with the country.
     */
    public function stores()
    {
        return $this->hasMany('App\Store');
    }

    /**
     * Get areas associated with the country.
     */
    public function areas()
    {
        return $this->hasMany('App\Area');
    }
}
