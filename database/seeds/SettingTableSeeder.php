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
            'attribute_value'             => '<meta http-equiv=\"refresh\" content=\"1200\">',
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
            'attribute_key'               => 'facebook_embed_code',
            'attribute_value'             => '<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.8&appId=712214338937575";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, \'script\', \'facebook-jssdk\'));</script>

<div class="fb-page" data-href="https://www.facebook.com/RecepTayyipErdogan.Name/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/RecepTayyipErdogan.Name/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/RecepTayyipErdogan.Name/">Receptayyiperdogan.Name</a></blockquote></div>',
        ]);

        Setting::create([
            'attribute_key'               => 'twitter',
            'attribute_value'             => 'twitter account',
        ]);

        Setting::create([
            'attribute_key'               => 'twitter_embed_code',
            'attribute_value'             => '<a class="twitter-timeline" href="https://twitter.com/RecaiCansiz">Tweets by RecaiCansiz</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>',
        ]);

        Setting::create([
            'attribute_key'               => 'instagram',
            'attribute_value'             => 'instagram account',
        ]);

        Setting::create([
            'attribute_key'               => 'instagram_embed_code',
            'attribute_value'             => '<!-- SnapWidget --><iframe src="https://snapwidget.com/embed/335198" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:500px; height:125px"></iframe>',
        ]);

        Setting::create([
            'attribute_key'               => 'pinterest',
            'attribute_value'             => 'pinterest account',
        ]);

        Setting::create([
            'attribute_key'               => 'pinterest_embed_code',
            'attribute_value'             => '<a data-pin-do="embedPin" data-pin-lang="tr" href="https://www.pinterest.com/pin/99360735500167749/"></a> <script async defer src="//assets.pinterest.com/js/pinit.js"></script>',
        ]);

        Setting::create([
            'attribute_key'               => 'weather_embed_code',
            'attribute_value'             => '<a href="http://www.accuweather.com/en/tr/istanbul/318251/weather-forecast/318251" class="aw-widget-legal"></a><div id="awcc1487253526003" class="aw-widget-current"  data-locationkey="1-318251_1_AL" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1487253526003"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>',
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