<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Store;
use App\Country;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewStoreListingTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function manager_can_view_store_list()
    {
        //Arrange
        //create list of stores

        $user = User::create([
            'name' => 'Ahmed',
            'email' => 'Ahmed@gmail.com',
            'role'  => '1', //Manager
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

        Store::create([
            'country_id'    => 99999,
            'name_en'       => 'flower store 1',
            'name_ar'       => 'flowers in arabic',
            'phone'         => '3432432',
            'email'         => 'asdasd@ddd.com',
            'is_approved'   => '1'
        ]);

        //Act
        //view list of store
        $this->visit('/manager/stores');


        //Assert
        //check list is viewed
        $this->see('flower store 1');
        $this->see('flowers in arabic');
        $this->see('3432432');
        $this->see('asdasd@ddd.com');

    }
}
