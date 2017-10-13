<?php

namespace App\Http\Controllers;

use App\Area;
use App\Core\Cart\Cart;
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
     * @var Cart
     */
    private $cart;

    /**
     * LocaleController constructor.
     * @param Country $countryModel
     * @param Area $areaModel
     * @param Cart $cart
     */
    public function __construct(Country $countryModel, Area $areaModel, Cart $cart)
    {
        $this->countryModel = $countryModel;
        $this->areaModel = $areaModel;
        $this->cart = $cart;
    }

    public function setCountry(Request $request)
    {
        $country = $this->countryModel->find($request->country)->toArray();
        session()->put('selectedCountry',$country, 60 * 24);
        session()->forget('selectedArea');
        $this->cart->flushCart();
        return redirect()->intended('/');
    }

    public function setArea(Request $request)
    {
        dd($request->all());
        dd($request->area);
        if($request->area) {
            $area = $this->areaModel->find($request->area)->toArray();
            session()->put('selectedArea',$area, 60 * 24);
        }
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
        $selectedCountry = session()->get('selectedCountry');
        $selectedArea = session()->get('selectedArea');
        $areas = $selectedCountry['areas'];

        return view('locale.select_area',compact('areas','selectedArea'));
    }

    public function getCountryAreas($countryID)
    {
        $country = $this->countryModel->find($countryID);
        session()->put('selectedCountry',$country->toArray(), 60 * 24);
        session()->forget('selectedArea');
        $this->cart->flushCart();

        $data = $country->areas->map(function($c){
            return ['id'=>$c->id, 'name' => $c->{'name_'.app()->getLocale()}];
        });

        return response()->json(['data'=>$data]);
    }

}
