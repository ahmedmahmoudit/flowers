<?php

namespace Tests\Feature;

use App\Country;
use App\Store;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddStoreTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function manager_can_add_store()
    {
        //Arrange
        //create store
        $user = User::create([
            'name' => 'Ahmed',
            'email' => 'Ahmed@gmail.com',
            'role'  => '1', //Admin
            'password' => bcrypt('secret'),
            'api_token' => str_random(60),
            'remember_token' => str_random(10),]);
        $this->be($user); //You are now authenticated

        Country::create([
            'id'            => 99999,
            'country_code'  => 'flower store 1',
            'name_en'       => 'kuwait',
            'name_ar'       => 'الكويت',
            'currency_en'   => 'KWD',
            'currency_ar'   => 'ك د',
        ]);

        $response = $this->post('manager/stores', [
            'country_id'    => 99999,
            'name_en'       => 'flower store 1',
            'name_ar'       => 'flowers in arabic',
            'phone'         => '3432432',
            'email'         => 'asdasd@ddd.com',
            'is_approved'   => '1'
        ]);

//        Act
//        view list of store
//        dd($response);

        $this->seeInDatabase('stores', ['country_id'    => 99999,
                                            'name_en'       => 'flower store 1',
                                            'name_ar'       => 'flowers in arabic',
                                            'phone'         => '3432432',
                                            'email'         => 'asdasd@ddd.com',
                                            'is_approved'   => '1']);

    }
}
