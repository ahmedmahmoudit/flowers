<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token', 'role', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The productLikes that belong to the User.
     */
    public function productLikes()
    {
        return $this->belongsToMany('App\Product', 'user_likes');
    }

    /**
     * Get orders associated with the user.
     */
    public function orders()
    {
        return $this->hasMany('App\Order')->where('captured_status',1);
    }

    public function isManager()
    {
        if($this->attributes['role'] == '1')
        {
            return 1;
        }

        return 0;
    }

    public function isStoreAdmin()
    {
        if($this->attributes['role'] == '2')
        {
            return 1;
        }

        return 0;
    }

    public function addresses()
    {
        return $this->hasMany(Address::class,'user_id');
    }

    /**
     * The Store
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function scopeDaily($query)
    {
        return $query->where('created_at', '>=', Carbon::today()->toDateString())
            ->where('created_at', '<', Carbon::tomorrow()->toDateString());
    }

    public function scopeMonthly($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->startOfMonth()->toDateString())
            ->where('created_at', '<', Carbon::now()->endOfMonth()->toDateString());
    }

    public function scopeYearly($query)
    {
        return $query->whereYear('created_at', date('Y'));
    }


}
