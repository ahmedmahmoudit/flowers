<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('orders')->truncate();
        DB::table('order_details')->truncate();

        $users = \App\user::where('role',3)->take(10)->get();
        foreach ($users as $user)
        {

            $products = \App\Product::skip(random_int(5,30))
                            ->take(random_int(2,7))
                            ->get();
            $totalPrice = 0;
            foreach ($products as $product)
            {
                $totalPrice += $product->detail->price;
            }

            $order = factory(App\Order::class)
//                ->create(['user_id' => $user->id, 'net_amount' => $totalPrice]);
                ->create(['net_amount' => $totalPrice]);

            $storesRelatedToOrder = $products->pluck('store_id')->unique();

            $order->stores()->attach($storesRelatedToOrder);

            foreach ($products as $product)
            {
                $order->orderDetails()->save(factory(App\OrderDetail::class)
                    ->create(['product_id' => $product->id, 'price' => $product->detail->price]));
            }

        }

        $this->command->info('Orders Seeded!');
    }
}
