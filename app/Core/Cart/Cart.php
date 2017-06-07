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

//        if(!array_key_exists('product_attribute_id',$item) || !is_int($item['product_attribute_id']) || $item['product_attribute_id'] <= 0 ) {
//            throw new Exception('Invalid Product Attribute');
//        }
    }

    public function make(Collection $products)
    {
        $this->items = collect([]);
        $cartItems = $this->getItems();

        $products->map(function($product) use ($cartItems) {
//            $cartItem = $cartItems['id'] = $product->id;
//            dd($cartItem);
            $cartItem = $cartItems[$product->id];
//            dd($cartItem['quantity']);
            $productQuantity = $cartItem['quantity'];
//            dd($productQuantity);
            $product->subTotal = $product->detail->price * $productQuantity;
            $product->quantity = $productQuantity;
            return $this->items->push($product);
        });

        $this->subTotal = $this->items->sum('subTotal');
        $this->grandTotal = $this->subTotal;

        return $this;
    }
}