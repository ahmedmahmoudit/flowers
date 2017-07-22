<?php

namespace App\Core\Cart;

use Exception;
use Illuminate\Support\Facades\Session;

class SessionCart implements CartInterface {

    const CART_KEY='FLOWERS_CART';
    const CART_GRAND_TOTAL_KEY='FLOWERS_CART_GRAND_TOTAL';
    const CART_SUB_TOTAL_KEY='FLOWERS_CART_SUB_TOTAL';
    const SHIPPING_COUNTRY='SHIPPING_COUNTRY';
    const COUPON_KEY='COUPON';

    /**
     */
    public function __construct()
    {
        $this->initCart();
    }

    private function initCart($force = false)
    {
        if(!Session::has(self::CART_KEY) || $force) {
            Session::put(self::CART_KEY,[]);
            Session::put(self::CART_GRAND_TOTAL_KEY,0);
            Session::put(self::CART_SUB_TOTAL_KEY,0);
            Session::put(self::COUPON_KEY,null);
        }
    }

    public function addCoupon($coupon)
    {
        if(SESSION::has(self::COUPON_KEY)) {
            SESSION::forget(self::COUPON_KEY);
        }
        SESSION::put(self::COUPON_KEY,$coupon);
    }

    public function getCoupon()
    {
        return SESSION::get(self::COUPON_KEY);
    }

    public function addItem(array $item)
    {
        if($this->hasItem($item)) {
            $this->updateItem($item);
        }
        $this->setItem($item);
    }

    public function getItemByKey( $key)
    {
        $items = $this->getItems();
        return $items[$key];
    }

    /**
     * @param array $item
     * @throws Exception
     * Update The Cart Item
     */
    public function updateItem(array $item)
    {
        $cartItems = collect($this->getItems());
        $itemKey = $this->stripKey($item);
        if(!$cartItems->contains('id',$itemKey)) {
            throw new \Exception('Invalid Cart Item');
        }
        $cartItem = $cartItems->where('id',$itemKey)->first();
        $updated = array_merge($cartItem,$item);
        $this->setItem($updated);
    }

    public function removeItem($key)
    {
        $cartItems = collect($this->getItems());
        $collection = $cartItems->keyBy('id');
        if($collection->has($key)) {
            $collection->forget($key);
        }
        Session::put(self::CART_KEY,$collection);
        Session::put(self::COUPON_KEY,null);
    }

    private function setItem($item)
    {
        $cartItems = collect($this->getItems())->keyBy('id');
        $key = $this->stripKey($item);
        $cartItems[$key] = $item;
        Session::put(self::CART_KEY,$cartItems->all());
    }

    public function getItems()
    {
        return Session::get(self::CART_KEY,[]);
    }

    private function hasItem($item)
    {
        $key = $this->stripKey($item);
        $cartItems = collect(Session::get(self::CART_KEY));
        return $cartItems->contains('id',$key);
    }

    private function stripKey($item)
    {
        return $item['id'];
    }

    public function flushCart()
    {
        $this->initCart($force= true);
    }

}