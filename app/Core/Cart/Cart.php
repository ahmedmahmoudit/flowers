<?php

namespace App\Core\Cart;

use Exception;
use Illuminate\Database\Eloquent\Collection;

class Cart {
    /**
     * @var CartInterface
     */
    private $cart;

    public $subTotal; // before calculating sale price
    public $grandTotal; // after calculating sale price
    public $items = []; // Item Collection

    /**
     * Cart constructor.
     * @param CartInterface $cart
     */
    public function __construct(SessionCart $cart)
    {
        $this->cart = $cart;
    }

    public function addItem(array $item ) {
        $this->validateItem($item);
        return $this->cart->addItem($item);
    }

    public function removeItem($key) {
        return $this->cart->removeItem($key);
    }

    public function updateItem(array $item)
    {
        $this->validateItem($item);
        return $this->cart->updateItem($item);
    }

    public function getItems()
    {
        return collect($this->cart->getItems());
    }

    public function getItemsCount()
    {
        return collect($this->cart->getItems())->count();
    }
    
    public function getItemByKey($key)
    {
        return $this->cart->getItemByKey($key);
    }

    public function flushCart()
    {
        return $this->cart->flushCart();
    }

    private function validateItem($item)
    {
        if(!is_array($item) || !count($item === 1)) {
            throw new Exception('Item can only contain one array');
        }

        if(!array_key_exists('quantity',$item) || !is_int($item['quantity']) || $item['quantity'] <= 0 ) {
            throw new Exception('Invalid Quantity');
        }

    }

    public function make(Collection $products)
    {
        $this->items = collect([]);
        $cartItems = $this->getItems();

        $products->map(function($product) use ($cartItems) {

//            $finalPrice = $product->detail->is_sale ?
            $cartItem = $cartItems[$product->id];
            $productQuantity = $cartItem['quantity'];
            $product->subTotal = $product->detail->price * $productQuantity;
            $product->grandTotal = $product->detail->final_price * $productQuantity;
            $product->quantity = $productQuantity;
            $product->delivery_time = $cartItem['delivery_time'];
            $product->delivery_date = $cartItem['delivery_date'];
            return $this->items->push($product);
        });

        $this->subTotal = $this->items->sum('subTotal');
        $this->grandTotal = $this->items->sum('grandTotal');

        return $this;
    }
}