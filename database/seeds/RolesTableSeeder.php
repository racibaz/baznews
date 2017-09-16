<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'member',
            'display_name'  => 'Çalışan Üye',
            'description'   => 'Çalışan Üye',
            'is_active'     => 1,
        ]);

        Role::create([
            'name'          => 'editor',
            'display_name'  => 'Editör',
            'description'   => 'Veri Girişi',
            'is_active'     => 1,
        ]);

        Role::create([
            'name'          => 'owner',
            'display_name'  => 'Grup Yetkilisi',
            'description'   => 'Grup Yetkilileri',
            'is_active'     => 1,
        ]);

        Role::create([
            'name'          => 'admin',
            'display_name'  => 'Adminler',
            'description'   => 'Site Yöneticileri',
            'is_active'     => 1,
        ]);
        
        Role::create([
            'name'          => 'super_admin',
            'display_name'  => 'Süper Adminler',
            'description'   => 'Site Yöneticileri',
            'is_active'     => 1,
        ]);

        Role::create([
            'name'          => 'demo',
            'display_name'  => 'Demo Kullanıcılar',
            'description'   => 'Demo Kullanıcılar için oluşturuldu.',
            'is_active'     => 1,
        ]);

    }
}
