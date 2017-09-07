<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        //Manger User
        DB::table('users')->insert([
            'name' => 'manager',
            'email' => 'manager@test.com',
            'password' => bcrypt('password'),
            'role' => '1', // manager
            'api_token' => str_random(60),
        ]);

//        //Admin User
//        DB::table('users')->insert([
//            'name' => 'admin',
//            'email' => 'admin@test.com',
//            'password' => bcrypt('password'),
//            'role' => '2', // manager
//            'api_token' => str_random(60),
//            'store_id' => \App\Store::all()->random()->id
//        ]);
//
//        factory(App\User::class, 1)->create([
//            'role' => '3',
//            'email' => 'user@test.com'
//        ]);

        $this->command->info('Users Seeded!');
    }
}
