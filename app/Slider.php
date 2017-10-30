<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }


    public function scopeDesktop($query)
    {
        return $query->where('mobile',0);
    }

    public function scopeMobile($query)
    {
        return $query->where('mobile',1);
    }
}
