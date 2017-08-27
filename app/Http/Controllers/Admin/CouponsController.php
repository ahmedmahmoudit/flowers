<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCouponRequest;
use Illuminate\Support\Facades\Request;
use App\Repositories\CouponRepositoryInterface;
use App\Store;
use Illuminate\Support\Facades\Auth;

class CouponsController extends Controller
{
    /**
     * @var $coupon
     */
    private $coupon;

    /**
     * CouponController constructor.
     *
     * @param CouponRepositoryInterface $coupon
     */
    public function __construct(CouponRepositoryInterface $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Show All coupons
     *
     * @return mixed
     */
    public function index()
    {
        if(Auth::user()->isStoreAdmin())
        {
            $coupons = $this->coupon->getByStore();
        }
        else
        {
            $coupons = $this->coupon->getAll();
        }

        return view('backend.shared.coupons.index', compact('coupons'));
    }

    /**
     * Create coupon
     *
     * @return mixed
     */
    public function create()
    {
        $stores = Store::all();
        return view('backend.shared.coupons.create', compact('stores'));
    }

    /**
     * Create a coupon
     *
     * @var CreateCouponRequest $request
     *
     * @return mixed
     */
    public function store(CreateCouponRequest $request)
    {
        $attributes = $request->only(['percentage','code', 'minimum_charge', 'expiry_date', 'quantity_left']);
        $stores = [];
        if(Auth::user()->isManager())
        {
            $stores = $request->only(['stores']);
        }
        else
        {
            $stores['stores'] = [Auth::user()->store->id];
        }

//        if($attributes['quantity'] == '0')
//        {
//            $attributes['is_limited'] = '-1';
//        }

        $coupon = $this->coupon->create($attributes);
        if(count($stores['stores']) > 0)
        {
            $coupon->stores()->syncWithoutDetaching($stores['stores']);
        }

        return redirect(Request::segment(1).'/coupons');
    }

    /**
     * Edit coupon
    #
     * @var integer $id
     *
     * @return mixed
     */
//    public function edit($id)
//    {
//        $coupon = $this->coupon->getById($id);
//
//        return view('manager.coupon.edit', compact('coupon'));
//    }
//
//    /**
//     * Update a coupon
//     *
//     * @var integer $id
//     * @var UpdateCouponRequest $request
//     *
//     * @return mixed
//     */
//    public function update($id, UpdateCouponRequest $request)
//    {
//        $attributes = $request->only(['percentage','code', 'minimum_charge', 'due_date', 'is_limited']);
//        $this->coupon->update($id, $attributes);
//
//        return redirect()->route('coupons.index');
//    }

    /**
     * Delete a coupon
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $this->coupon->delete($id);

        return url()->previous();
    }

    /**
     * Disable a coupon
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function disable($id)
    {
        $this->coupon->disable($id);

        return url()->previous();
    }

    /**
     * Activate a coupon
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function activate($id)
    {
        $this->coupon->activate($id);

        return url()->previous();
    }
}
