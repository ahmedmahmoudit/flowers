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

        if(!session()->has('selectedCountry')) {
            $country = Country::where('name_en','kuwait')->first()->toArray();
            session()->put('selectedCountry',$country,60 * 24);
            session()->put('selectedCountryID',$country['id'],60 * 24);
        }

        if(!session()->has('selectedArea')) {
            session()->put('selectedArea',false, 60 * 24);
        }

        return $next($request);
    }
}