<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('coupons')->truncate();
        DB::table('coupon_store')->truncate();

        factory(App\Coupon::class, 10)->create();

        $this->command->info('Coupons Seeded!');

        $stores = \App\Store::all();

        $coupons = \App\Coupon::all();
        foreach ($coupons as $coupon)
        {
            $coupon->stores()->attach($stores);
        }

        $this->command->info('Coupons Assigned to stores!');
    }
}
