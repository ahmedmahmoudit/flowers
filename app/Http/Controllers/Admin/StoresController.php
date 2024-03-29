<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Country;
use App\DeliveryTime;
use App\Http\Requests\UpdateStoreAreaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\UpdateStoreSettingsRequest;
use App\Repositories\StoreRepositoryInterface;
use App\Store;
use App\StoreDeliveryTime;
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
     * @var DeliveryTime
     */
    private $deliveryTimeModel;

    /**
     * StoreController constructor.
     *
     * @param StoreRepositoryInterface $store
     * @param DeliveryTime $deliveryTimeModel
     */
    public function __construct(StoreRepositoryInterface $store, DeliveryTime $deliveryTimeModel)
    {
        $this->store = $store;
        $this->deliveryTimeModel = $deliveryTimeModel;
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
        $attributes = $request->only(['country_id', 'name_en', 'name_ar', 'phone', 'email', 'second_email']);

        $imageName = null;

        if ($imageUpload['image']) {

            $imageName = str_random(15) . '.jpg';
            Image::make($imageUpload['image'])->resize(320, 240)->encode('jpg')->save('uploads/stores/' . $imageName);
            $attributes['image'] = $imageName;
        }

        //manger create store
        $attributes['is_approved'] = '1';
        $attributes['image'] = $imageName;
//        $attributes['slug_en'] = $attributes['name_en'];
//        $attributes['slug_ar'] = $attributes['name_ar'];
        $store = $this->store->create($attributes);

        if (count($areas['areas']) > 0) {
            $store->areas()->syncWithoutDetaching($areas['areas']);
        }

        $this->updateSlug($store);

        return redirect('manager/stores');
    }

    /**
     * Show store
     * #
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
     * #
     * @var integer $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        $store = $this->store->getById($id);
        $countries = Country::all();

        return view('backend.manager.store.edit', compact('store', 'countries'));
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
        $attributes = $request->only(['country_id', 'name_en', 'name_ar', 'phone', 'email', 'second_email', 'vendor_id']);

        $store = $this->store->getById($id);

        if ($request->hasFile('image')) {
            $imageName = str_random(15) . '.jpg';
            Image::make($request->file('image'))->fit(400)->encode('jpg')->save('uploads/stores/' . $imageName);
            $attributes['image'] = $imageName;
        }


        $this->store->update($id, $attributes);

        $this->updateSlug($store);

        return redirect()->back()->with('status', 'Success');
    }

    /**
     * show a store area
     *
     * @return mixed
     */
    public function showAreas()
    {
        $store_id = Auth::user()->store->id;
        $store = Store::find($store_id);
        $areas = $store->areas->pluck(['id'])->toArray();
        $dbAreas = Area::where('country_id', $store->country_id)->get();

        return view('backend.admin.areas', compact('dbAreas', 'areas'));
    }

    /**
     * Update a store area
     *
     * @var UpdateStoreAreaRequest $request
     *
     * @return mixed
     */
    public function updateAreas(UpdateStoreAreaRequest $request)
    {
        $attributes = $request->only(['areas']);
        $this->store->updateAreas(Auth::user()->store->id, $attributes['areas']);

        return redirect()->route('admin.areas');
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

        if ($store->products->first()) {
            Session()->flash('success', 'Store has products, can\'t be deleted!');
            return route('manager.stores.index');
        }

        $this->store->delete($id);
        return route('manager.stores.index');
    }

    public function getAllWithVerifications()
    {
        $stores = $this->store->getAll();
        return view('backend.manager.verifications.stores', compact('stores'));
    }

    public function verify($id)
    {
        $this->store->verify($id);

        Session()->flash('success', 'Store Verified Successfully!');
        return route('manager.verifications.stores');
    }

    public function unVerify($id)
    {
        $this->store->unVerify($id);

        Session()->flash('success', 'Store Un Verified Successfully!');
        return route('manager.verifications.stores');
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
        $deliveryTimes = $this->deliveryTimeModel->get();
        $storeDeliveryTimes = $store->deliveryTimes->pluck('id')->toArray();
        return view('backend.admin.settings', compact('store', 'deliveryTimes', 'storeDeliveryTimes'));
    }

    public function settingsUpdate(UpdateStoreSettingsRequest $request)
    {

        $imageUpload = $request->only(['image']);
        $delivery = $request->only([
            'delivery_time1',
            'delivery_time2',
            'delivery_time3'
        ]);
        $attributes = $request->only([
            'name_en',
            'name_ar',
            'phone',
            'email',
            'second_email',
            'instagram_username',
            'minimum_delivery_days',
            'start_week_day',
            'end_week_day',
            'active'
        ]);

        if ($imageUpload['image']) {
            $imageName = str_random(15);
            Image::make($imageUpload['image'])->fit(400, 400)->encode('jpg')->save('uploads/stores/' . $imageName . '.jpg');
            $attributes['image'] = $imageName . '.jpg';
        }

        $this->store->update(Auth::user()->store->id, $attributes);

        $store = Auth::user()->store;

        if ($request->delivery_times) {
            $store->deliveryTimes()->sync($request->delivery_times);
        }

        return redirect()->route('admin.settings');
    }

}
