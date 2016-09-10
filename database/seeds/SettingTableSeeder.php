<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'attribute_key'               => 'language_id',
            'attribute_value'             => '1',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'title',
            'attribute_value'             => 'Site Başlığı',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'description',
            'attribute_value'             => 'Site Tanımı',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'keywords',
            'attribute_value'             => 'Anahtar Kelimler',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'meta_text',
            'attribute_value'             => 'Meta text',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'logo',
            'attribute_value'             => 'logo path',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'facebook',
            'attribute_value'             => 'face account',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'twitter',
            'attribute_value'             => 'twitter account',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'google',
            'attribute_value'             => 'google account',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'disqus',
            'attribute_value'             => 'disqus account',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'abstract_text',
            'attribute_value'             => 'abstract_text ler ',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'footer_text',
            'attribute_value'             => 'site alt yazısı',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'contact',
            'attribute_value'             => 'iletişim bilgileri',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'copyright',
            'attribute_value'             => 'copyright yazısı',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'slogan',
            'attribute_value'             => 'Sloganımız',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'url',
            'attribute_value'             => 'url miz',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'rss_count',
            'attribute_value'             => '20',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'sitemap_count',
            'attribute_value'             => '20',
            'is_active'                   => 1,
        ]);
    }
}