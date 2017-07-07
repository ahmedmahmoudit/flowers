<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdRequest;
use App\Repositories\AdRepositoryInterface;

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

        $attributes = $request->only(['image','order','link']);
        $this->ad->create($attributes);

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
