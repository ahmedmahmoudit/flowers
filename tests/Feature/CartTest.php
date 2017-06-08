<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\App;
use Tests\TestCase;

class CartTest extends TestCase
{

//    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCartIndexPage()
    {
        $cart = app::make(\App\Core\Cart\Cart::class);
        $cart->flushCart();

        $product1 = factory(\App\Product::class)->create();
        $product2 = factory(\App\Product::class)->create();

        $cart->addItem(['id'=>$product1->id,'quantity'=> 2]);
        $cart->addItem(['id'=>$product2->id,'quantity'=>3]);


        $cart->removeItem($product1->id);
        $this->assertEquals(1,$cart->getItemsCount());
        dd($cart->getItems());
//        $this->assertEquals(1,$cart->getItemsCount());
//        $this->visit('CartTest')
////            ->see('quantity_'.$product1->id)
////            ->see('quantity_'.$product2->id)
////            ->see($product1->name)
////            ->see($product2->name)
//        ;
    }

    /**
     * @expectedException Exception
     */
    public function testCartThrowsExceptionOnInValidProduct()
    {
        $cart = app::make(\App\Core\Cart\Cart::class);
        $cart->addItem([1=>['quantity' => 0,'product_attribute_id'=>1]]);
    }
//
    public function testCartAddItem()
    {
        $cart = app::make(\App\Core\Cart\Cart::class);

        $cart->addItem(['id'=>10,'quantity'=>2,'product_attribute_id'=>1]);
        $cart->addItem(['id'=>20,'quantity'=>2,'product_attribute_id'=>2]);
        $cart->addItem(['id'=>10,'quantity'=>3,'product_attribute_id'=>2]);

        $this->assertEquals(2,count($cart->getItems()));
    }
//     */
    public function testCartRemoveItem()
    {
        $cart = app::make(\App\Core\Cart\Cart::class);
        $cart->addItem(['id'=>1,'quantity' => 1,'product_attribute_id'=>1]);
        $cart->addItem(['id'=>2,'quantity' => 1,'product_attribute_id'=>1]);
        $cart->removeItem(1);
        $this->assertEquals(1, count($cart->getItems()) );
        $this->assertNotContains(1, $cart->getItems()->keys() );
    }
    
    public function testCartUpdatesQuantity()
    {
        $cart = app::make(\App\Core\Cart\Cart::class);
        $cart->addItem(['id'=>1,'quantity' => 1,'product_attribute_id'=>1]);
        $cart->addItem(['id'=>2,'quantity' => 2,'product_attribute_id'=>1]);
        $cart->addItem(['id'=>1,'quantity' => 4,'product_attribute_id'=>1]);
        $items = $cart->getItems();
        $this->assertEquals(4, $items[1]['quantity'] );
    }
    public function testFlushCart()
    {
        $cart = app::make(\App\Core\Cart\Cart::class);
        $cart->addItem(['id'=>1,'quantity' => 1,'product_attribute_id'=>1]);
        $cart->addItem(['id'=>2,'quantity' => 2,'product_attribute_id'=>1]);
        $cart->flushCart();
        $this->assertEquals(0, $cart->getItems()->count() );
    }

    public function testCartMakesItems()
    {
        $cart = app::make(\App\Core\Cart\Cart::class);
        $cart->flushCart();

        $product1 = factory(\App\Product::class,1)->create(['company_id' => 1]);

        $product2 = factory(\App\Product::class,1)->create(['company_id' => 1]);

        $cart->addItem(['id'=>$product1->id,'quantity'=>2,'product_attribute_id'=>1]);
        $cart->addItem(['id'=>$product2->id,'quantity'=>3,'product_attribute_id'=>1]);

        $products = \App\Product::whereIn('id',[$product1->id,$product2->id])->get();
        $cart->make($products);
        $this->assertObjectHasAttribute('subTotal',$cart );
        $this->assertObjectHasAttribute('grandTotal',$cart );
        $this->assertEquals(2,count($cart->items));
        $this->assertEquals(82,$cart->subTotal);
        $this->assertEquals(80,$cart->grandTotal);
        $this->assertEquals(4.6,$cart->netWeight);
    }

}
