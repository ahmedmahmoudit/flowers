<?php
namespace App\Http\Composers;

use App\Country;
use Cache;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AppGlobals
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @param Country $countryModel
     * @param Request $request
     */
    public function __construct(Country $countryModel, Request $request)
    {
        $this->countryModel = $countryModel;
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $countries = Cache::get('countries');
        $selectedCountry = Cache::get('selectedCountry');
        $selectedArea = Cache::has('selectedArea') ? Cache::get('selectedArea') : false;
        $areas = $selectedCountry['areas'];

        $view->with([
            'countries' => $countries,
            'areas' => $areas,
            'selectedArea' => $selectedArea,
            'selectedCountry' => $selectedCountry,
            'locale' => app()->getLocale()
        ]);

    }

}