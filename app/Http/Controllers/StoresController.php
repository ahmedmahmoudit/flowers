<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Requests\UpdateStoreAreaRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Requests\CreateStoreRequest;
use App\Repositories\StoreRepositoryInterface;
use App\Store;
use Cache;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * @var $store
     */
    private $store;
    /**
     * @var Store
     */
    private $storeModel;
    /**
     * @var Area
     */
    private $areaModel;

    /**
     * StoreController constructor.
     *
     * @param Store $storeModel
     * @param Area $areaModel
     * @internal param StoreRepositoryInterface $store
     */
    public function __construct(Store $storeModel, Area $areaModel)
    {
        $this->middleware('area')->only(['index']);
        $this->storeModel = $storeModel;
        $this->areaModel = $areaModel;
    }

    /**
     * Show All stores
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $selectedArea = Cache::get('selectedArea');
        $selectedCountry = Cache::get('selectedCountry');
        $stores = $this->storeModel->with('areas')->approved()->whereHas('areas',function($q) use ($selectedCountry) {
            $q->where('areas.country_id',$selectedCountry['id']);
        })->paginate(100);

        $viewType = $request->has('type') && $request->type == 'list' ? 'list' : 'grid';

        return view('stores.index', ['stores' => $stores,'country'=>$selectedCountry,'viewType'=>$viewType]);
    }

    public function show($id,$slug)
    {
        $store = $this->storeModel->find($id);
        return view('stores.view',compact('store'));
    }

    /**
     * Create store
     *
     * @return mixed
     */
    public function create()
    {
        return view('manager.store.create');
    }

    /**
     * Create a store
     *
     * @var CreateStoreRequest $request
     *
     * @return mixed
     */
    public function store(CreateStoreRequest $request)
    {
        $attributes = $request->only(['country_id','name_en','name_ar','phone','email','is_approved']);
        $this->store->create($attributes);

        return redirect('manager/stores');
    }

    /**
     * Create store
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        $store = $this->store->getById($id);

        return view('manager.store.edit', compact('store'));
    }

    /**
     * Update a store
     *
     * @var integer $id
     * @var UpdateStoreRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateStoreRequest $request)
    {
        $attributes = $request->only(['country_id','name_en','name_ar','phone','email']);
        $this->store->update($id, $attributes);

        return redirect()->route('stores.index');
    }

    /**
     * Update a store area
     *
     * @var integer $id Store ID
     * @var UpdateStoreAreaRequest $request
     *
     * @return mixed
     */
    public function updateAreas($id, UpdateStoreAreaRequest $request)
    {
        $attributes = $request->only(['areas']);
        $this->store->updateAreas($id, $attributes);

        return redirect()->route('stores.index');
    }

    /**
     * Delete a store
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $this->store->delete($id);

        return redirect()->route('stores.index');
    }

    /**
     * Disable a store
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function disable($id)
    {
        $this->store->disable($id);

        return redirect()->route('stores.index');
    }

    /**
     * Activate a store
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function activate($id)
    {
        $this->store->activate($id);

        return redirect()->route('stores.index');
    }

    /**
     * rate store
     *
     * @return mixed
     */
    public function userRate($token)
    {
        return view('store_rate');
    }

    public function saveUserRate(Request $request)
    {
        dd($request);
    }

}
