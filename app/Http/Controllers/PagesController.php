<?php

namespace App\Http\Controllers;


use App\Area;
use App\Category;
use App\Core\Cart\Cart;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\ProductDetail;
use App\Store;
use Auth;
use Cache;
use DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function getAbout()
    {
    }

    public function getContact()
    {
        
    }

}
