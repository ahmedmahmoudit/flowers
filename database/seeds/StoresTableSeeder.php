<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('stores')->truncate();


        factory(App\Store::class, 5)->create();

        $this->command->info('Stores Seeded!');
    }
}
