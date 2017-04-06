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
            'attribute_key'               => 'country',
            'attribute_value'             => 'turkey',
            'description'                 => 'Country name',
            'is_active'                   => 1,
        ]);

        Setting::create([
            'attribute_key'               => 'city',
            'attribute_value'             => 'Istanbul',
            'description'                 => 'City name',
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
            'attribute_key'               => 'timezone',
            'attribute_value'             => 'Europe/Istanbul',
        ]);

        Setting::create([
            'attribute_key'               => 'logo',
            'attribute_value'             => 'logo.jpg',
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
            'attribute_value'             => '
                    <address>
                        <p><strong>Adres:</strong> Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </address>
                    <p><strong>Mail:</strong> <a href="#">mail@mailto.com</a></p>
                    <p><strong>Phone:</strong> (878) 989 99 99</p>',
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
            'attribute_key'               => 'user_contract',
            'attribute_value'             => 'user_contract',
        ]);

        Setting::create([
            'attribute_key'               => 'url',
            'attribute_value'             => 'http://www.baznews.com',
        ]);

        Setting::create([
            'attribute_key'               => 'google_recaptcha_site_key',
            'attribute_value'             => '6Leo2RsUAAAAAJtI0Mc6lqd2Nme25F2xLg3r5CER',
        ]);

        Setting::create([
            'attribute_key'               => 'google_recaptcha_secret_key',
            'attribute_value'             => '6Leo2RsUAAAAAEPPstzkGLtPV3W8IDsaYjtdIIib',
        ]);

        Setting::create([
            'attribute_key'               => 'head_code',
            'attribute_value'             => 'head codes ',
        ]);

        Setting::create([
            'attribute_key'               => 'footer_code',
            'attribute_value'             => 'footer codes',
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
            'attribute_key'               => 'addthis',
            'attribute_value'             => 'addthis account js',
        ]);

        Setting::create([
            'attribute_key'               => 'disqus',
            'attribute_value'             => '
            
<div id="disqus_thread"></div>
<script>
var disqus_config = function () {
this.page.url = \'http://www.baznews.com/{{$record->slug}}\';
this.page.identifier = \'{{$record->slug}}\';
this.page.title = \'{{$record->title}}\';
};

(function() { // DON\'T EDIT BELOW THIS LINE
var d = document, s = d.createElement(\'script\');
s.src = \'https://baznews.disqus.com/embed.js\';
s.setAttribute(\'data-timestamp\', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                 
            
            ',
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
            'attribute_value'             => 'jpg,tiff,gif,png',
        ]);

        Setting::create([
            'attribute_key'               => 'allow_video_formats',
            'attribute_value'             => 'video/avi,video/mpeg,video/quicktime,avi,mov,mp4,3gp,3gp2,wmv,flv',
        ]);

        Setting::create([
            'attribute_key'               => 'latitude',
            'attribute_value'             => '41.0082',
        ]);

        Setting::create([
            'attribute_key'               => 'longitude',
            'attribute_value'             => '28.9784',
        ]);
    }
}