<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $table = 'static_pages';
    protected $guarded = ['id'];
    public $localeStrings = ['title','body'];
}
