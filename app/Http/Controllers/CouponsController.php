<?php

namespace App\Http\Controllers;


use App\Core\Cart\Cart;
use App\Country;
use App\Coupon;
use App\Http\Requests\CreateCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Product;
use App\Repositories\CouponRepositoryInterface;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * @var $coupon
     */
    private $coupon;
    /**
     * @var Coupon
     */
    private $couponModel;
    /**
     * @var Cart
     */
    private $cart;
    /**
     * @var Product
     */
    private $productModel;

    /**
     * CouponController constructor.
     *
     * @param CouponRepositoryInterface $coupon
     * @param Coupon $couponModel
     * @param Cart $cart
     * @param Product $productModel
     */
    public function __construct(CouponRepositoryInterface $coupon,Coupon $couponModel, Cart $cart,Product $productModel)
    {
        $this->coupon = $coupon;
        $this->couponModel = $couponModel;
        $this->cart = $cart;
        $this->productModel = $productModel;
    }

    /**
     * Show All coupons
     *
     * @return mixed
     */
    public function index()
    {
        $coupons = $this->coupon->getAll();
        return view('manager.coupon.index', compact('coupons'));
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
        $attributes = $request->only(['percentage','code', 'minimum_charge', 'expiry_date', 'quantity']);
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

    public function applyCoupon(Request $request)
    {

        $coupon = $this->couponModel->active()->where('code',$request->coupon)->first();

        if($coupon) {


            if(!$coupon->hasEnoughQuantity()) {
                return redirect()->back()->with('error',__('Coupon has been consumed'));
            }

            if($coupon->hasExpired()) {
                return redirect()->back()->with('error',__('Coupon has expired'));
            }

            $products = $this->productModel->has('detail')->with(['detail','store'])->whereIn('id',$this->cart->getItems()->pluck('id')->toArray())->get();

            $cart = $this->cart->make($products);

            if($cart->grandTotal < $coupon->minimum_charge) {

                return redirect()->back()->with('error',__('minimum amount for this coupon is ' .$coupon->minimum_charge));
            }

            // check if the store's product is in coupons
            $couponStores = $coupon->stores->pluck('id');
            $productStores = collect();
            $products->map(function($product) use ($productStores) {
                $productStores->push($product->store->id);
            });
            $hasAnyCouponStoresInCart = $productStores->intersect($couponStores);
            if($hasAnyCouponStoresInCart->count() <= 0) {
                return redirect()->back()->with('error',__('this coupon is not valid for the items in the cart'));
            }

            $cart->addCoupon((object) $coupon);

            return redirect()->back()->with('success',__('Coupon applied'));

        }

        return redirect()->back()->with('error',__('Invalid Coupon'));

    }

}
