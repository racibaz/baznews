<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Language;
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
            'language_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'name' => 'recai cansız',
            'email' => 'r.c67@hotmail.com',
            'password' => bcrypt("1"),
//            'slug' => 'slug',
//            'cell_phone' => 'cell_phone',
//            'facebook' => 'facebook',
//            'twitter' => 'twitter',
//            'linkedin' => 'linkedin',
//            'youtube' => 'youtube',
//            'sex' => 1,
//            'blood_type' => 'A+',
//            'avatar' => 'avatar',
//            'IP' => 'avatar',
            'status' => 1,
            'active' => 1,
        ]);


        $user2 = User::create([
            'language_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'name' => 'editor cansız',
            'email' => 'editor@hotmail.com',
            'password' => bcrypt("1"),
//            'slug' => 'slug',
//            'cell_phone' => 'cell_phone',
//            'facebook' => 'facebook',
//            'twitter' => 'twitter',
//            'linkedin' => 'linkedin',
//            'youtube' => 'youtube',
//            'sex' => 1,
//            'blood_type' => 'A+',
//            'avatar' => 'avatar',
//            'IP' => 'avatar',
            'status' => 1,
            'active' => 1,
        ]);


        $user3 = User::create([
            'language_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'name' => 'yazar cansız',
            'email' => 'yazar@hotmail.com',
            'password' => bcrypt("1"),
//            'slug' => 'slug',
//            'cell_phone' => 'cell_phone',
//            'facebook' => 'facebook',
//            'twitter' => 'twitter',
//            'linkedin' => 'linkedin',
//            'youtube' => 'youtube',
//            'sex' => 1,
//            'blood_type' => 'A+',
//            'avatar' => 'avatar',
//            'IP' => '1213123',
            'status' => 1,
            'active' => 1,
        ]);
        
    }
}
