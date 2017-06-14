<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    Public function getAreas($id)
    {
        return Area::where('country_id', $id)->get();
    }
}
