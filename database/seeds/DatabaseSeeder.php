<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(SlidersTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);

        $this->call(NewsLettersTableSeeder::class);

        $this->call(StoresTableSeeder::class);

        $this->call(AreasTableSeeder::class);

        $this->call(StoreAreasTableSeeder::class);

        $this->call(CouponsTableSeeder::class);

        $this->call(ProductsTableSeeder::class);

        $this->call(UserLikesTableSeeder::class);

        $this->call(ProductCategoriesTableSeeder::class);

        $this->call(OrdersTableSeeder::class);
    }
}
