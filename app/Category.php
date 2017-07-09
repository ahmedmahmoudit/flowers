<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $localeStrings = ['name', 'slug', 'description'];
    protected $guarded = ['id'];

    /**
     * The products that belong to the category.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

}
