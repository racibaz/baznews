<?php

use App\Models\City;
use App\Models\Country;
use App\Models\User;
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
        $user1 = User::create([
            'country_id' => Country::first()->id,
            'city_id' => City::first()->id,
            'first_name' => 'recai',
            'last_name' => 'cansız',
            'email' => 'r.c67@hotmail.com',
            'password' => bcrypt("1"),
            'slug' => 'slug',
            'cell_phone' => 'cell_phone',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'linkedin' => 'linkedin',
            'youtube' => 'youtube',
            'sex' => 1,
            'blood_type' => 'A+',
            'avatar' => 'avatar',
            'IP' => 'avatar',
            'is_active' => 1,
        ]);


        $user2 = User::create([
            'country_id' => Country::first()->id,
            'city_id' => City::first()->id,
            'first_name' => 'recai',
            'last_name' => 'cansız',
            'email' => 'editor@hotmail.com',
            'password' => bcrypt("1"),
            'slug' => 'slug',
            'cell_phone' => 'cell_phone',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'linkedin' => 'linkedin',
            'youtube' => 'youtube',
            'sex' => 1,
            'blood_type' => 'A+',
            'avatar' => 'avatar',
            'IP' => 'avatar',
            'is_active' => 1,
        ]);


        $user3 = User::create([
            'country_id' => Country::first()->id,
            'city_id' => City::first()->id,
            'first_name' => 'recai',
            'last_name' => 'cansız',
            'email' => 'yazar@hotmail.com',
            'password' => bcrypt("1"),
            'slug' => 'slug',
            'cell_phone' => 'cell_phone',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'linkedin' => 'linkedin',
            'youtube' => 'youtube',
            'sex' => 1,
            'blood_type' => 'A+',
            'avatar' => 'avatar',
            'IP' => 'avatar',
            'is_active' => 1,
        ]);
        
    }
}
