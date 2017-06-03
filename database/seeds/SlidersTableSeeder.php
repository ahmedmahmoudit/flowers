<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->delete();

        factory(App\Slider::class, 5)->create();
        $this->command->info('Sliders Seeded!');
    }
}
