<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateStoreAreaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Requests\CreateStoreRequest;
use App\Repositories\StoreRepositoryInterface;

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
        return view('manager.store.index', ['stores' => $stores]);
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

}
