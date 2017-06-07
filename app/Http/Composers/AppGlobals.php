<?php
namespace App\Http\Composers;

use App\Country;
use Cache;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AppGlobals
{


    public function __construct()
    {
    }

    public function compose(View $view)
    {

        $view->with([

        ]);

    }

}