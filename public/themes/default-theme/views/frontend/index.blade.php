@extends($activeTheme . '::frontend.master')

@section('content')


    1.widget managment yapılacak.<br>
    2.Tema parçalara ayrılarak cachelenecek<br>
    3.Setting module tamamlanacak.<br>
    3.module içerinde group route yapılan yerler admin sidebar da group olarak gösterilebilir mi?.<br>
    4.Theme yönetimi yapılacak.<br>
    5.Theme de widget yerilerini göstermek için her temanın içerisine temenın şablonunu gösteren foto olacak aktif widget dan o resmi çekip tema ve widget yönetimine koyulacak.<br>


    <h1>Sayfa Ayarları</h1>
    <br />
    


    <h1>breakNewsItems</h1>
    <br />
    @foreach($breakNewsItems as $breakNewsItem)
        {{$breakNewsItem->title}} <br/>
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

    @widget('\App\Modules\News\Widgets\RecommendationNews')


    <br />
    widget ve sitemap rss tabloları yapılacak.

@endsection

@section('widgets')

    @foreach($modules as $module)

        @if($module['widget'] == true )

            {!! Theme::view($module['slug'] . '::frontend.widget') !!}
        @endif

    @endforeach



    {{--@include($activeTheme . '::frontend.book.index')--}}

@endsection

@section('meta_tags')
    <meta name="keywords" content="{{ Redis::get('keywords') }}"/>
    <meta name="description" content="{{ Redis::get('description') }}"/>
@endsection


