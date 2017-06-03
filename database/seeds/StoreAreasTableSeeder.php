<?php

use Illuminate\Database\Seeder;

class StoreAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('area_store')->truncate();

        $stores = \App\Store::all();

        $areas = \App\Area::all();
        foreach ($areas as $area)
        {
            $area->stores()->attach($stores);
        }

        $this->command->info('Store Areas Attach Seeded!');
    }
}
