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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('products')->truncate();
        DB::table('product_details')->truncate();
        DB::table('product_images')->truncate();

        $stores = \App\Store::all();
        foreach ($stores as $store)
        {
            factory(App\Product::class, 5)
                ->create(['store_id' => $store->id])
                ->each(function ($u) {
                    $u->productDetail()->save(factory(App\ProductDetail::class)->make());
                })
                ->each(function ($u) {
                    $u->productImages()->saveMany(factory(App\ProductImage::class,5)->make());
                });
        }

        $this->command->info('Products Seeded!');
    }
}
