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
            'attribute_key'               => 'language_code',
            'attribute_value'             => 'tr',
            'description'                 => 'Language short code',
            'is_active'                   => 1,
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
            'attribute_key'               => 'static_meta_tags',
            'attribute_value'             => "
                        <meta charset='UTF-8'>    
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
                        <meta name='copyright' content='company name'>
                        <meta name='language' content='TR'>
                        <meta name='robots' content='index,follow'>
                        <meta name='revised' content='Sunday, July 18th, 2010, 5:15 pm'>
                        <meta name='Classification' content='Media'>
                        <meta name='designer' content=''>
                        <meta name='reply-to' content='email@hotmail.com'>
                        <meta name='owner' content=''>
                        <meta name='url' content='http://www.websiteaddrress.com'>
                        <meta name='coverage' content='Worldwide'>
                        <meta name='distribution' content='Global'>
                        <meta name='rating' content='General'>
                        <meta name='revisit-after' content='7 days'>
                        <meta name='target' content='all'>
                        <meta name='HandheldFriendly' content='True'>
                        <meta name='MobileOptimized' content='320'>
                        <meta name='date' content='Sep. 27, 2010'>
                        <meta name='DC.title' content='Unstoppable Robot Ninja'>
                        <meta name='ResourceLoaderDynamicStyles' content=''>
                        <meta name='medium' content='News Site'>
                        <meta itemprop='name' content='jQTouch'>
                        <meta http-equiv='Expires' content='0'>
                        <meta http-equiv='Pragma' content='no-cache'>
                        <meta http-equiv='Cache-Control' content='no-cache'>
                        <meta http-equiv='imagetoolbar' content='no'>
                        <meta http-equiv='x-dns-prefetch-control' content='off'>
            ",
            'description'                 => 'Fixed meta tags list',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'page_refresh',
            'attribute_value'             => '<meta http-equiv=\"refresh\" content=\"60\">',
        ]);

        Setting::create([
            'attribute_key'               => 'timezone',
            'attribute_value'             => 'Europe/Istanbul',
        ]);

        Setting::create([
            'attribute_key'               => 'logo',
            'attribute_value'             => 'logo.jpg',
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
            'attribute_key'               => 'google_tag_manager_head_code',
            'attribute_value'             => 'xxxxxx',
        ]);

        Setting::create([
            'attribute_key'               => 'google_tag_manager_body_code',
            'attribute_value'             => 'xxxxxxx',
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
            'attribute_key'               => 'rss_cache_life_time',
            'attribute_value'             => '60',
        ]);

        Setting::create([
            'attribute_key'               => 'sitemap_count',
            'attribute_value'             => '20',
        ]);

        Setting::create([
            'attribute_key'               => 'allow_photo_formats',
            'attribute_value'             => '.jpg|.tiff|.gif|.png',
        ]);

        Setting::create([
            'attribute_key'               => 'allow_video_formats',
            'attribute_value'             => '.avi|.mov|.mp4|.3gp|.3gp2|.wmv|.flv',
        ]);

    }
}