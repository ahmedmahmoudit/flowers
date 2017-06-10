<?php

namespace App\Http\Controllers;

use App\Area;
use App\Country;
use Cache;
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
        $country = $this->countryModel->find($request->country)->toArray();
        Cache::put('selectedCountry',$country, 60 * 24);
        Cache::forget('selectedArea');
        return redirect()->intended('/');
    }

    public function setArea(Request $request)
    {
        $area = $this->areaModel->find($request->area)->toArray();
        Cache::put('selectedArea',$area, 60 * 24);
        return redirect()->intended('/');
    }

    public function setLocale($locale)
    {
        if(in_array($locale,['en','ar'])) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }

    public function selectArea()
    {
        $selectedCountry = Cache::get('selectedCountry');
        $selectedArea = Cache::get('selectedArea');
        $areas = $selectedCountry['areas'];
        return view('locale.select_area',compact('areas','selectedArea'));
    }


}
