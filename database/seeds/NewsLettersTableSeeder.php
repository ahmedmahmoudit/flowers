<?php

use Illuminate\Database\Seeder;

class NewsLettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('newsletters')->truncate();

        factory(App\Newsletter::class, 50)->create();

        $this->command->info('NewsLetters Seeded!');
    }
}
