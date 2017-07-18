<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\UpdateStoreAreaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Requests\CreateStoreRequest;
use App\Repositories\StoreRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;

class StoresController extends Controller
{
    /**
     * @var $store
     */
    private $store;

    /**
     * StoreController constructor.
     *
     * @param StoreRepositoryInterface $store
     */
    public function __construct(StoreRepositoryInterface $store)
    {
        $this->store = $store;
    }

    /**
     * Show All stores
     *
     * @return mixed
     */
    public function index()
    {
        $stores = $this->store->getAll();
        return view('backend.manager.store.index', compact('stores'));
    }

    /**
     * Create store
     *
     * @return mixed
     */
    public function create()
    {
        $countries = Country::all();
        return view('backend.manager.store.create', compact('countries'));
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
        $imageUpload = $request->only(['image']);
        $areas = $request->only(['areas']);
        $attributes = $request->only(['country_id','name_en','name_ar','phone','email', 'second_email']);

        if($imageUpload['image'])
        {
            $imageName = str_random(15);
            Image::make($imageUpload['image'])->resize(320, 240)->encode('jpg')->save('uploads/stores/'.$imageName.'.jpg');
            $attributes['image'] = $imageName.'.jpg';
        }

        //manger create store
        $attributes['is_approved'] = '1';
        $attributes['image'] = $imageName.'.jpg';
        $attributes['slug_en'] = $attributes['name_en'];
        $attributes['slug_ar'] = $attributes['name_ar'];
        $storeData = $this->store->create($attributes);

        if(count($areas['areas']) > 0)
        {
            $storeData->areas()->syncWithoutDetaching($areas['areas']);
        }

        return redirect('manager/stores');
    }

    /**
     * Show store
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $store = $this->store->getById($id);

        return view('backend.manager.store.show', compact('store'));
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
        $store = $this->store->getById($id);

        if($store->products->first())
        {
            Session()->flash('success', 'Store has products, can\'t be deleted!');
            return route('manager.stores.index');
        }

        $this->store->delete($id);
        return route('manager.stores.index');
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

        Session()->flash('success', 'Store Disabled Successfully!');
        return route('manager.stores.index');
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

        Session()->flash('success', 'Store Activated Successfully!');
        return route('manager.stores.index');
    }

    public function settings()
    {
        $store = Auth::user()->store;
        return view('backend.admin.settings', compact('store'));
    }

    public function settingsUpdate(\Illuminate\Http\Request $request)
    {
        $attributes = $request->only(['minimum_delivery_days', 'start_week_day', 'end_week_day']);
        $this->store->update(Auth::user()->store->id, $attributes);

        return redirect()->route('admin.settings');
    }

}
