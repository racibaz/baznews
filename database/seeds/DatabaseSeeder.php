<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguagesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(AnnouncementsTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(ContactTypeTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(SitemapsTableSeeder::class);
        $this->call(RssTableSeeder::class);
        $this->call(WidgetManagersTableSeeder::class);
        $this->call(AdvertisementsTableSeeder::class);
//        $this->call(WidgetGroupTableSeeder::class);
        $this->call(PingsTableSeeder::class);
    }
}
