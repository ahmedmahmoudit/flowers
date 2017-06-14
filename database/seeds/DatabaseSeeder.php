<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    protected $tables = [
        'password_resets',
        'sliders',
        'newsletters',
        'area_store',
        'stores',
        'areas',
        'countries',
        'coupons',
        'coupon_store',
        'categories',
        'products',
        'category_product',
        'product_details',
        'user_likes',
        'product_images',
        'orders',
        'order_details',
        'users',
        'addresses'

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->truncateTables();

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

        Model::reguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function truncateTables()
    {
        foreach($this->tables as $table) {
            DB::table($table)->truncate();
        }
    }
}
