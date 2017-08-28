<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends BaseModel
{
    protected $table = 'static_pages';
    protected $guarded = ['id'];
    public $localeStrings = ['title','body'];
}
