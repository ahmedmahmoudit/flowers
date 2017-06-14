<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Repositories\CouponRepositoryInterface;

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
        $coupons = $this->coupon->getAll();
        return view('backend.shared.coupons.index', compact('coupons'));
    }

    /**
     * Create coupon
     *
     * @return mixed
     */
    public function create()
    {
        return view('manager.coupon.create');
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
        $attributes = $request->only(['percentage','code', 'minimum_charge', 'due_date', 'is_limited']);
        $this->coupon->create($attributes);

        return redirect('manager/coupons');
    }

    /**
     * Edit coupon
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        $coupon = $this->coupon->getById($id);

        return view('manager.coupon.edit', compact('coupon'));
    }

    /**
     * Update a coupon
     *
     * @var integer $id
     * @var UpdateCouponRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateCouponRequest $request)
    {
        $attributes = $request->only(['percentage','code', 'minimum_charge', 'due_date', 'is_limited']);
        $this->coupon->update($id, $attributes);

        return redirect()->route('coupons.index');
    }

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

        return redirect()->route('coupon.index');
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

        return redirect()->route('coupons.index');
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

        return redirect()->route('coupons.index');
    }
}
