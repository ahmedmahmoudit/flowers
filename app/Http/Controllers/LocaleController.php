<?php

namespace App\Http\Controllers;

use App\Area;
use App\Country;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * @var Country
     */
    private $countryModel;
    /**
     * @var Area
     */
    private $areaModel;

    /**
     * LocaleController constructor.
     * @param Country $countryModel
     * @param Area $areaModel
     */
    public function __construct(Country $countryModel, Area $areaModel)
    {
        $this->countryModel = $countryModel;
        $this->areaModel = $areaModel;
    }
    public function setCountry(Request $request)
    {
        $country = $this->countryModel->find($request->country);
        session()->put('selectedCountry',$country);
        session()->forget('selectedArea');
        return redirect()->back();
    }

    public function setArea(Request $request)
    {
        $area = $this->areaModel->find($request->area);
        session()->put('selectedArea',$area);
        return redirect()->back();
    }

    public function setLocale($locale)
    {
        if(in_array($locale,['en','ar'])) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }


}
