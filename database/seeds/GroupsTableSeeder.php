<?php

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group1 = Group::create([
            'name'          => 'Üst Yönetim',
            'description'   => 'Site Yöneticileri',
            'is_active'  => 1,
        ]);

        $group2 = Group::create([
            'name'          => 'Baş Editörler',
            'description'   => 'Baş Editörler',
            'is_active'  => 1,
        ]);

        $group3 = Group::create([
            'name'          => 'Editörler',
            'description'   => 'Editörler',
            'is_active'  => 1,
        ]);

        $group4 = Group::create([
            'name'          => 'İçerik Sağlayıcılar',
            'description'   => 'İçerik Sağlayıcılar',
            'is_active'  => 1,
        ]);


        $user1 = User::find(1);
        $user2 = User::find(2);
        $user3 = User::find(3);

        $group1->users()->attach($user1);
        $group2->users()->attach($user2);
        $group3->users()->attach($user3);
    }
}
