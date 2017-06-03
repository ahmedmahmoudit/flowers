<?php

use Illuminate\Database\Seeder;

class UserLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('user_likes')->truncate();

        $users = \App\User::all();
        foreach ($users as $user)
        {
            $products = \App\Product::all()->take(random_int(1,150));
            $user->productLikes()->attach($products);
        }

        $this->command->info('User Likes Seeded!');
    }
}
