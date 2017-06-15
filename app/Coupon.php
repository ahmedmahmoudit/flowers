<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'due_date'];
    protected $guarded = ['id'];

    public function setDueDateAttribute( $value ) {
        $this->attributes['due_date'] = (new Carbon($value))->format('d-m-y');
    }

    public function value( $totalAmount, $percentage ) {
        return ($totalAmount*$percentage)/100;
    }

    /**
     * The stores that belong to the coupon.
     */
    public function stores()
    {
        return $this->belongsToMany('App\Store');
    }

    /**
     * Get orders associated with the coupon.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
