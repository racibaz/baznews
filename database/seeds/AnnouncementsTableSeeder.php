<?php

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ann1 = Announcement::create([
            'user_id'          => 1,
            'title'   => 'Duyuru başlık 1',
            'description'   => 'Duyuru Tanımı 1',
            'order'   => 1,
            'show_time'   => \Carbon\Carbon::now()->addDays(5),
            'is_active'  => 1,
        ]);

        $ann2 = Announcement::create([
            'user_id'          => 1,
            'title'   => 'Duyuru başlık 2',
            'description'   => 'Duyuru Tanımı 2',
            'order'   => 2,
            'show_time'   => \Carbon\Carbon::now()->addDays(1),
            'is_active'  => 1,
        ]);


        $ann3 = Announcement::create([
            'user_id'          => 2,
            'title'   => 'Duyuru başlık 3',
            'description'   => 'Duyuru Tanımı 3',
            'order'   => 3,
            'show_time'   => \Carbon\Carbon::now()->addDays(10),
            'is_active'  => 1,
        ]);

        $ann4 = Announcement::create([
            'user_id'          => 4,
            'title'   => 'Demo Grubu Duyurusu',
            'description'   => 'Duyuru Tanımı 4',
            'order'   => 4,
            'show_time'   => \Carbon\Carbon::now()->addDays(10),
            'is_active'  => 1,
        ]);


        $group1 = \App\Models\Group::find(4);
        $group1->announcements()->attach($ann1);

        $group5 = \App\Models\Group::find(5);
        $group5->announcements()->attach($ann4);
    }
}
