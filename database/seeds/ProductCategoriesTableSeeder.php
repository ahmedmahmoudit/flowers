<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('category_product')->truncate();

        $products = \App\Product::all();
        foreach ($products as $product)
        {
            $product->categories()->attach(random_int(2,5));
        }

        $this->command->info('User Likes Seeded!');
    }
}
