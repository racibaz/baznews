@extends($activeTheme . '::frontend.master')

@section('content')
    <article>
        <div class="container" id="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-slider slider module" id="manset-slider">
                        <ul class="bxslider">
                            @foreach($mainCuffNewsItems as $mainCuffNewsItem)
                                <li data-slide-index="{{$mainCuffNewsItem->id}}">
                                    <a href="{!! !empty($mainCuffNewsItem->cuff_direct_link) ?  $mainCuffNewsItem->cuff_direct_link : route('show_news', ['slug' => $mainCuffNewsItem->slug]) !!}">
                                        <img src="{{ asset('images/news_images/' . $mainCuffNewsItem->id . '/cuff_photo/' . $mainCuffNewsItem->cuff_photo)}}" data-src="{{ asset('images/news_images/' . $mainCuffNewsItem->id . '/cuff_photo/' . $mainCuffNewsItem->cuff_photo)}}" alt="News Logo" class="lazy-slider">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="slider-paging">
                            <ul class="main-slider-paging">
                                @foreach($mainCuffNewsItems as $index => $mainCuffNewsItem)
                                    <li class="bx-pager-item">
                                        <a data-slide-index="{{$index}}" href="{!! !empty($mainCuffNewsItem->cuff_direct_link) ?  $mainCuffNewsItem->cuff_direct_link : route('show_news', ['slug' => $mainCuffNewsItem->slug]) !!}" class="bx-pager-link">
                                            {{++$index}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hidden-xs">
                    <div class="main-slider slider module" id="spot-slider">
                        <ul class="bxslider">
                            @foreach($boxCuffNewsItems as $boxCuffNewsItem)
                                <li data-slide-index="{{$mainCuffNewsItem->id}}">
                                    <a href="{!! route('show_news', ['slug' => $mainCuffNewsItem->slug]) !!}">
                                        <img src="{{ asset('images/news_images/' . $boxCuffNewsItem->id . '/322x265_' . $boxCuffNewsItem->thumbnail )}}" alt="{{$boxCuffNewsItem->title}}" >
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="slider-paging">
                            <ul class="main-slider-paging">
                                @foreach($boxCuffNewsItems as $index => $boxCuffNewsItem)
                                    <li class="bx-pager-item">
                                        <a data-slide-index="{{$index}}" href="{!! route('show_news', ['slug' => $boxCuffNewsItem->slug]) !!}" class="bx-pager-link">
                                            {{++$index}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="post-box-slider">
                        <ul class="bxcarousel">

                            @foreach($miniCuffNewsItems as $miniCuffNewsItem)
                                <li>
                                    <div class="thumbnail">
                                        <a href="{{ route('show_news', ['slug' => $miniCuffNewsItem->slug]) }}">
                                            <img src="{{ asset('images/news_images/' . $miniCuffNewsItem->id . '/196x150_' . $miniCuffNewsItem->thumbnail) }}" alt="Dummyİmage" >
                                            <div class="caption">
                                                <span class="ct-title">{{$miniCuffNewsItem->small_title}}</span>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- /.thumbnail -->
                                </li>
                                <!-- /.col -->
                            @endforeach

                            <!-- /.col -->
                        </ul>
                    </div>
                    <!-- /.post-box-slider -->
                </div>
            </div><!-- /.row -->

            <div class="row" id="home_center">
                <div class="col-md-8" id="content">
                    <div class="center-content">
                        @foreach($cuffNewsCategories as $cuffNewsCategory)
                            <div class="img-new-list ">
                                <div class="title-section">
                                    <div class="pull-right">
                                        <a href="{{ route('show_news_category', $cuffNewsCategory->slug) }}" class="btn btn-primary">{{ trans('news::news_category.show_more') }}</a>
                                    </div>
                                    <h3>
                                        <a href="{{ route('show_news_category', $cuffNewsCategory->slug) }}"><span> {{ $cuffNewsCategory->name }} </span></a>
                                    </h3>
                                </div>
                                <div class="new-list-ct module">
                                    <div class="left-img-ct" style="background-image:{{ Theme::asset($activeTheme . '::img/example.jpg')}};backgroun-position:0 0; background-repeat: no-repeat;background-size: cover;">
                                        <a href="new-details.html" class="full-link"></a>
                                        <span class="shadow"></span>
                                        <div class="new-ct">
                                            <h3 class="new-title">Dapibus Ridiculus Ultricies Ornare Consectetur1</h3>
                                            <time class="new-date">
                                                <span class="timeago" title="">11 saat önce</span>
                                            </time>
                                        </div>
                                    </div>
                                    <ul class="new-list">
                                        @foreach($cuffNewsCategory->news->take(5) as $news)
                                            <li>
                                                <a href="{!! route('show_news', ['slug' => $news->slug]) !!}"
                                                   class="full-link"
                                                   data-img="{{ asset('images/news_images/' . $news->id . '/220x310_' . $news->thumbnail) }}"
                                                   data-title="{{$news->title}}"
                                                   data-time="{{$news->updated_at->diffForHumans() }}">
                                                </a>
                                                <div class="new-ct">
                                                    <h3 class="new-title">{{$news->title}} </h3>
                                                    <time class="new-date">
                                                        <span class="timeago">{{$news->updated_at->diffForHumans() }}</span>
                                                    </time>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div><!-- /.new-list-ct -->
                            </div><!-- /.col-md-8 -->
                            <!-- /.image-banner-list -->
                        @endforeach
                        <div class="advert-center module">
                            @if($advertisements->where('name','center_1')->first())
                                {!! $advertisements->where('name','center_1')->first()->code !!}
                            @endif
                        </div>
                    </div>
                </div><!-- /.col -->

                <div class="col-md-4" id="sidebar">
                    <div class="sidebar">
                        {{--TODO: Tablı haber görünümü istenildiğinde buradan yorumları kaldırarak kullanılabilir.--}}
                        {{--<div class="nw-sm-img module">--}}
                            {{--<div role="tabpanel">--}}
                                {{--<!-- Nav tabs -->--}}
                                {{--<ul class="nav nav-tabs" role="tablist">--}}
                                    {{--<li role="presentation" class="active">--}}
                                        {{--<a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a>--}}
                                    {{--</li>--}}
                                    {{--<li role="presentation">--}}
                                        {{--<a href="#son_dakika" aria-controls="son_dakika" role="tab" data-toggle="tab">Son Dakika</a>--}}
                                    {{--</li>--}}
                                    {{--<li role="presentation">--}}
                                        {{--<a href="#cok_okunanlar" aria-controls="cok_okunanlar" role="tab" data-toggle="tab">Çok Okunanlar</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}

                                {{--<!-- Tab panes -->--}}
                                {{--<div class="tab-content">--}}
                                    {{--<div role="tabpanel" class="tab-pane active" id="video">--}}
                                        {{--<ul class="new-list no-list">--}}
                                            {{--<li class="nw-bx no-list active">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                        {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                    {{--</span>--}}
                                                {{--<span class="dec">1</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                        {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                    {{--</span>--}}
                                                {{--<span class="dec">2</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                        {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                    {{--</span>--}}
                                                {{--<span class="dec">3</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">4</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">5</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                        {{--</ul><!-- /.new-list -->--}}
                                    {{--</div><!-- /.tab-pane -->--}}
                                    {{--<div role="tabpanel" class="tab-pane" id="son_dakika">--}}
                                        {{--<ul class="new-list no-list">--}}
                                            {{--<li class="nw-bx no-list active">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">1</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">2</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">3</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">4</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">5</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                        {{--</ul><!-- /.new-list -->--}}
                                    {{--</div><!-- /.tab-pane -->--}}

                                    {{--<div role="tabpanel" class="tab-pane" id="cok_okunanlar">--}}
                                        {{--<ul class="new-list no-list">--}}
                                            {{--<li class="nw-bx no-list active">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">1</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">2</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">3</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">4</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                            {{--<li class="nw-bx no-list">--}}
                                                {{--<a href="new-details.html" title="" class="full-link"></a>--}}
                                                {{--<span class="imgwrap">--}}
                                                    {{--<img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">--}}
                                                {{--</span>--}}
                                                {{--<span class="dec">5</span>--}}
                                                {{--<div class="spot">Pellentesque Quam</div>--}}
                                                {{--<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>--}}
                                            {{--</li>--}}
                                        {{--</ul><!-- /.new-list -->--}}
                                    {{--</div><!-- /.tab-pane -->--}}
                                {{--</div><!-- /.tab-content -->--}}
                            {{--</div><!-- /rabpanel -->--}}
                        {{--</div><!-- /.nw-sm-img -->--}}
                        <div class="advert advert-right module">
                            @if($advertisements->where('name','right_blok_1')->first())
                                {!! $advertisements->where('name','right_blok_1')->first()->code !!}
                            @endif
                            {!!Cache::get('right_blok_1')!!}
                        </div>
                        @foreach($widgets->where('group','right_bar') as $widget )
                            @widget($widget['namespace'])
                        @endforeach

                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-6">
                    <div class="title-section">
                        <h1>
                            <span>{{trans('news::photo_gallery.photo_galleries')}}</span>
                        </h1>
                    </div>
                    <div class="th-nw-slide module">
                        <div id="m_pg1" class="pager">
                            @foreach($photoGalleries as $index =>  $photoGallery)

                                <a data-slide-index="{{$index}}" href="#" class="bx-pager-link">
                                    <span class="img-ct"><img src="{{ asset('gallery/' . $photoGallery->id . '/photos/58x58_' . $photoGallery->thumbnail)}}" /></span>
                                </a>
                            @endforeach
                        </div><!-- /.m-pg -->
                        <ul class="slide m-slider1" id="photo-gallery-slider">
                            @foreach($photoGalleries as $index =>  $photoGallery)
                                <li>
                                    <a href="{{route('show_photo_gallery',['slug' => $photoGallery->slug ])}}">
                                        <img src="{{ asset('gallery/' . $photoGallery->id . '/photos/497x358_' . $photoGallery->thumbnail)}}" />
                                    </a>
                                </li>
                            @endforeach
                        </ul><!-- /.m-slider -->
                    </div><!-- /.th-nw-slide -->
                </div><!-- /.col -->
                <div class="col-md-6">
                    <div class="title-section">
                        <h1>
                            <span>{{trans('news::video_gallery.video_galleries')}}</span>
                        </h1>
                    </div>
                    <div class="th-nw-slide module">
                        <div id="m_pg2" class="pager">
                            @foreach($videoGalleries as $index => $videoGallery)
                                <a data-slide-index="{{$index}}" href="{{route('show_video_gallery',['slug' => $videoGallery->videos->first()->slug ])}}" class="bx-pager-link">
                                    <span class="img-ct">
                                        <img src="{{ asset('video_gallery/' . $videoGallery->id . '/58x58_' . $videoGallery->thumbnail)}}" />
                                    </span>
                                </a>
                            @endforeach
                        </div><!-- /.m-pg -->
                        <ul class="slide m-slider1" id="video-gallery-slider">
                            @foreach($videoGalleries as $index =>  $videoGallery)
                                <li>
                                    <a href="{{route('show_videos',['slug' => $videoGallery->videos->first()->slug ])}}">
                                        <img src="{{ asset('video_gallery/' . $videoGallery->id . '/497x358_' . $videoGallery->thumbnail)}}" />
                                    </a>
                                </li>
                            @endforeach
                        </ul><!-- /.m-slider -->
                    </div><!-- /.th-nw-slide -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="widgets-center">
                @foreach($widgets->where('group','center') as $widget )
                    @widget($widget['namespace'])
                @endforeach
            </div>
        </div>
    </article><!-- /.article -->

@endsection



@section('meta_tags')
    <title> {{ Cache::tags('Setting')->get('title') }}  </title>
    <meta name="keywords" content="{{ Cache::tags('Setting')->get('keywords') }}"/>
    <meta name="description" content="{{ Cache::tags('Setting')->get('description') }}"/>
@endsection

@section('css')
@endsection

@section('js')

    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <script type="text/javascript">
        (function($){
            'use strict';

            /*--------------------------------------------------------
             Home Page Main News Slider
             * --------------------------------------------------------*/
            var mansetSlider = $('#manset-slider .bxslider').bxSlider({
                mode: "fade",
                auto:true,
                speed:0,
                pagerCustom: "main-slider-paging",
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>',
                onSliderLoad: function () {
                    $('#manset-slider li:first-child .bx-pager-link').addClass('active');
                },
                onSlideAfter:function($slideElement, oldIndex, newIndex){
                    $('#manset-slider .bx-pager-link').removeClass('active');
                    $('#manset-slider .bx-pager-link').each(function () {
                        if($(this).attr('data-slide-index')==newIndex){
                            $(this).addClass('active');
                        }
                    });
                }
            });
            sliderHoverAction('#manset-slider',mansetSlider);

            /*--------------------------------------------------------
             Home Page Right News Slider
             * --------------------------------------------------------*/
            var spotSlide = $('#spot-slider .bxslider').bxSlider({
                mode: "fade",
                speed:0,
                auto:true,
                pagerCustom: "main-slider-paging",
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>',
                onSliderLoad: function () {
                    $('#spot-slider li:first-child .bx-pager-link').addClass('active');
                },
                onSlideAfter:function($slideElement, oldIndex, newIndex){
                    $('#spot-slider .bx-pager-link').removeClass('active');
                    $('#spot-slider .bx-pager-link').each(function () {
                        if($(this).attr('data-slide-index')==newIndex){
                            $(this).addClass('active');
                        }
                    });
                }
            });
            sliderHoverAction('#spot-slider',spotSlide);

            /*--------------------------------------------------------
             Home Page Photo Gallery Slider
             * --------------------------------------------------------*/
            var imageSlider = $('#photo-gallery-slider').bxSlider({
                mode:'fade',
                speed:0,
                pagerCustom: '#m_pg1',
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>'
            });
            sliderHoverAction('#m_pg1',imageSlider);

            /*--------------------------------------------------------
             Home Page Video Gallery Slider
             * --------------------------------------------------------*/

            var videoSlider = $('#video-gallery-slider').bxSlider({
                mode:'fade',
                speed:0,
                pagerCustom: '#m_pg2',
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>'
            });
            sliderHoverAction('#m_pg2',videoSlider);

            /*--------------------------------------------------------
             Slider Pagination Hover Function
             * --------------------------------------------------------*/
            function sliderHoverAction(e, t) {
                var dis = e;
                $(e + " .bx-pager-link").hover(function() {
                    var e = $(this).attr("data-slide-index");
                    e != t.getCurrentSlide() && (t.goToSlide(e), t.stopAuto())
                    $(dis + ' .bx-pager-link').removeClass('active');
                    $(this).addClass('active');
                }, function() {
                    t.startAuto()
                })
            }

            /*--------------------------------------------------------
             Center Carousel Horizontal News Slider
             * --------------------------------------------------------*/
            $('.bxcarousel').bxSlider({
                slideWidth: 228,
                minSlides: 2,
                maxSlides: 5,
                slideMargin: 0,
                auto:true,
                pager:false,
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>'
            });

        })(jQuery);

        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#content,#sidebar').theiaStickySidebar();
        });
    </script>

@endsection
