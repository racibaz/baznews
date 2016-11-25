@extends($activeTheme . '::frontend.master')

@section('content')


    1.widget managment yapılacak.<br>
    2.Tema parçalara ayrılarak cachelenecek<br>
    3.Setting module tamamlanacak.<br>
  ++4.module içerinde group route yapılan yerler admin sidebar da group olarak gösterilebilir mi?.<br>
  ++5.Theme yönetimi yapılacak.<br>
    6.Theme de widget yerilerini göstermek için her temanın içerisine temenın şablonunu gösteren foto olacak aktif widget dan o resmi çekip tema ve widget yönetimine koyulacak.<br>
  ??7.Theme ayarlarından theme in alanları alınabilecek.(Tema ayarlarında 'sidebar','rightbar' vs.. listelenirken veriler theme in ayarlarından gelecek.)<br>
    8.Laravel Medialibrary <br>
    9.News Modülü geliştirilecek<br>
    v210.Moduller aktif ve pasif yapıldığında seeder  migrate ve seeder çalıştırılarak.Modul ayarları eklenip silinebilecek.(widget vs..)<br>
    11.Auth::user() presenter pattern ları yapılacak.<br>
  ++12.news edit sayfasına video,photo gallery,tags,video,photo lar eklenebilecek.<br>
    13.Video Ekleme Tamamlanacak.<br>
    14.php artisan komutlarının bazıları setting sayfasında çalıştırılabilecek..(backup list)<br>
    15.Social provider register sayfalarına bakılacak paaword sorunu çözülecek.<br/>
    16.Account sayfası yapılacak.(kullanıcı fotosu socialite dan alınabilir mi?) <br />
    17.Arşiv bölümü yapılacak. <br />



    <h1>Sayfa Ayarları</h1>
    <br />
    
    <example></example>

    <h1>breakNewsItems</h1>
    <br />
    @foreach($breakNewsItems as $breakNewsItem)
        {{$breakNewsItem->title}} <br/>


        <video id="example_video_1" class="video-js vjs-default-skin"
               controls preload="auto" width="640" height="264"
               poster="http://video-js.zencoder.com/oceans-clip.png"
               data-setup='{"example_option":true}'>
            <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
            <source src="http://video-js.zencoder.com/oceans-clip.webm" type="video/webm" />
            <source src="http://video-js.zencoder.com/oceans-clip.ogv" type="video/ogg" />
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
        </video>

        <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>


        {!! $breakNewsItem->video_embed !!} <br/>
    @endforeach

    <h1>bandNewsItem</h1>
    <br />
    @foreach($bandNewsItems as $bandNewsItem)
        {{$bandNewsItem->title}} <br/>
    @endforeach

    <h1>mainCuffNewsItems</h1>
    <br />
    @foreach($mainCuffNewsItems as $mainCuffNewsItem)
        {{$mainCuffNewsItem->title}} <br/>
    @endforeach

    <h1>miniCuffNewsItems</h1>
    <br />
    @foreach($miniCuffNewsItems as $miniCuffNewsItem)
        {{$miniCuffNewsItem->title}} <br/>
        <img src="{{$miniCuffNewsItem->cuff_photo}}"> <br/>
    @endforeach

    <h1>Haber Kategoriler</h1>
    <br />
    @foreach($cuffNewsCategories as $cuffNewsCategory)

        {{$cuffNewsCategory->name}} : <br>

        @foreach($cuffNewsCategory->news as $categoryNews)
            {{$categoryNews->title}},
        @endforeach
        <br>
    @endforeach

    <h1>Photo Galleries</h1>
    <br />
    @foreach($photoGalleries as $photoGallery)
        {{$photoGallery->title}} <br/>
    @endforeach

    <h1>Video Galleries</h1>
    <br />
    @foreach($videoGalleries as $videoGallery)
        {{$videoGallery->title}} <br/>
    @endforeach


    <br>
    {{--@widget('RecommendationNews')--}}

    @foreach($widgets as $widget)
        <br />
        @widget($widget['namespace'])
    @endforeach

    {{--<br />--}}
    {{--@widget('\App\Modules\Article\Widgets\RecentArticles')--}}
    {{--<br />--}}
    {{--@widget('\App\Modules\Book\Widgets\RecentBooks')--}}
    {{--<br />--}}
    {{--@widget('\App\Modules\Biography\Widgets\Biographies')--}}

    
    <br />
    widget ve sitemap rss tabloları yapılacak.

@endsection

{{--@section('widgets')--}}

    {{--@foreach($modules as $module)--}}

        {{--@if($module['widget'] == true )--}}

            {{--{!! Theme::view($module['slug'] . '::frontend.widget') !!}--}}
        {{--@endif--}}

    {{--@endforeach--}}

    {{--@include($activeTheme . '::frontend.book.index')--}}

{{--@endsection--}}

@section('meta_tags')
    <meta name="keywords" content="{{ Redis::get('keywords') }}"/>
    <meta name="description" content="{{ Redis::get('description') }}"/>
@endsection

@section('js')
    <script src="js/app.js"></script>
@endsection
