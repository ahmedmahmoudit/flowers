<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stores = \App\Store::all();
        foreach ($stores as $store)
        {
            factory(App\Product::class, 3)
                ->create(['store_id' => $store->id])
                ->each(function ($u) {
                    $u->detail()->save(factory(App\ProductDetail::class)->make());
                })
                ->each(function ($u) {
                    $u->productImages()->saveMany(factory(App\ProductImage::class,2)->make());
                })
            ;

        }

        $this->command->info('Products Seeded!');
    }
}
