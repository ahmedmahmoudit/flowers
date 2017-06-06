<?php
namespace App\Http\Composers;

use App\Country;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NavigationMenu
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
        $countries = $this->countryModel->with('areas')->get();
        $selectedArea = false;

        $selectedCountry = session()->get('selectedCountry');

        if(session()->has('selectedArea')) {
            $selectedArea = session()->get('selectedArea');
        }

        $areas = $selectedCountry->areas;

        $locale = session()->get('locale');

        $view->with([
            'countries' => $countries,
            'areas' => $areas,
            'selectedArea' => $selectedArea,
            'selectedCountry' => $selectedCountry,
            'locale' => $locale
        ]);

    }

}