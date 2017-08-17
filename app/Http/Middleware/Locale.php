<?php

namespace App\Http\Middleware;

use App\Country;
use Cache;
use Closure;

class Locale
{
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        }

        if(!Cache::has('countries')) {
            $countries = Country::all()->toArray();
            Cache::put('countries',$countries,60 * 24);
        }

        if(!Cache::has('selectedCountry')) {
            $country = Country::where('name_en','kuwait')->first()->toArray();
            Cache::put('selectedCountry',$country,60 * 24);
            Cache::put('selectedCountryID',$country['id'],60 * 24);
        }

        if(!Cache::has('selectedArea')) {
            Cache::put('selectedArea',false, 60 * 24);
        }

        return $next($request);
    }
}