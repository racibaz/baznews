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
        ]);

        Setting::create([
            'attribute_key'               => 'title',
            'attribute_value'             => 'BazNews Haber Scripti',
        ]);

        Setting::create([
            'attribute_key'               => 'description',
            'attribute_value'             => 'Rahatlıkla kullanabileceğiniz haber yazılımımızı hizemetinize sunuyoruz.',
        ]);

        Setting::create([
            'attribute_key'               => 'keywords',
            'attribute_value'             => 'online news script,news script,Haber scripti',
        ]);

        Setting::create([
            'attribute_key'               => 'meta_text',
            'attribute_value'             => 'Meta text',
        ]);

        Setting::create([
            'attribute_key'               => 'logo',
            'attribute_value'             => 'public/logo.jpg',
        ]);

        Setting::create([
            'attribute_key'               => 'facebook',
            'attribute_value'             => 'face account',
        ]);

        Setting::create([
            'attribute_key'               => 'twitter',
            'attribute_value'             => 'twitter account',
        ]);

        Setting::create([
            'attribute_key'               => 'google',
            'attribute_value'             => 'google account',
        ]);

        Setting::create([
            'attribute_key'               => 'disqus',
            'attribute_value'             => 'disqus account',
        ]);

        Setting::create([
            'attribute_key'               => 'abstract_text',
            'attribute_value'             => 'abstract_text ler ',
        ]);

        Setting::create([
            'attribute_key'               => 'footer_text',
            'attribute_value'             => 'site alt yazısı',
        ]);

        Setting::create([
            'attribute_key'               => 'contact',
            'attribute_value'             => 'iletişim bilgileri',
        ]);

        Setting::create([
            'attribute_key'               => 'copyright',
            'attribute_value'             => 'copyright yazısı',
        ]);

        Setting::create([
            'attribute_key'               => 'slogan',
            'attribute_value'             => 'Sloganımız',
        ]);

        Setting::create([
            'attribute_key'               => 'url',
            'attribute_value'             => 'http://www.baznews.com',
        ]);

        Setting::create([
            'attribute_key'               => 'rss_count',
            'attribute_value'             => '20',
        ]);

        Setting::create([
            'attribute_key'               => 'sitemap_count',
            'attribute_value'             => '20',
        ]);

        Setting::create([
            'attribute_key'               => 'band_news',
            'attribute_value'             => '5',
        ]);

        Setting::create([
            'attribute_key'               => 'box_cuff',
            'attribute_value'             => '20',
        ]);

        Setting::create([
            'attribute_key'               => 'break_news',
            'attribute_value'             => '5',
        ]);

        Setting::create([
            'attribute_key'               => 'main_cuff',
            'attribute_value'             => '20',
        ]);

        Setting::create([
            'attribute_key'               => 'mini_cuff',
            'attribute_value'             => '10',
        ]);
    }
}