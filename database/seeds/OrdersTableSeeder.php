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
            factory(App\Order::class, 5)
                ->create(['user_id' => $user->id])
                ->each(function ($u) {
                    $u->orderDetails()->saveMany(factory(App\OrderDetail::class,5)->make(['product_id' => random_int(1,150)]));
                });
        }

        $this->command->info('Orders Seeded!');
    }
}
