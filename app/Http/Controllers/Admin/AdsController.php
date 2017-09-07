<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdRequest;
use App\Repositories\AdRepositoryInterface;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    /**
     * @var $ad
     */
    private $ad;

    /**
     * AdController constructor.
     *
     * @param AdRepositoryInterface $ad
     */
    public function __construct(AdRepositoryInterface $ad)
    {
        $this->ad = $ad;
    }

    /**
     * Show All ads
     *
     * @return mixed
     */
    public function index()
    {
        $ads = $this->ad->getAll();
        return view('backend.manager.ad.index', compact('ads'));
    }

    /**
     * Create ad
     *
     * @return mixed
     */
    public function create()
    {
        return view('backend.manager.ad.create');
    }

    /**
     * Create a ad
     *
     * @var CreateAdRequest $request
     *
     * @return mixed
     */
    public function store(CreateAdRequest $request)
    {
        $attributes = $request->only(['image','link']);
        $ad = $this->ad->create($attributes);
//
//        if($request->has('image')) {
//            $randomImageName = str_random(15).'.jpg';
//            Image::make($request->image)->resize(250, 450)->encode('jpg')->save('uploads/products/'.$randomImageName);
//            $ad->image = $randomImageName;
//            $ad->save();
//        }

        return redirect('manager/ads');
    }


    /**
     * Delete ad
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $this->ad->delete($id);

        return route('manager.ads.index');
    }
}
