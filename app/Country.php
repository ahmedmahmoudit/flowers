<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    protected $localeStrings = ['name','currency'];

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
