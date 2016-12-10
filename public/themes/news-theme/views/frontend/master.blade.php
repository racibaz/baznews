<!DOCTYPE html>
<html>
<head>

    @yield('meta_tags')
    {!! Redis::get('static_meta_tags') !!}

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="{{ Theme::asset($activeTheme . '::js/bootstrap/css/bootstrap.min.css') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/bx-slider/jquery.bxslider.min.css') }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ Theme::asset($activeTheme . '::css/style.css') }}" rel="stylesheet">

    @yield('css')



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{--{!!  Redis::get('google_tag_manager_head_code') !!}--}}

</head>
<body>

    {{--<div id="fb-root"></div>--}}
    {{--<script>(function(d, s, id) {--}}
            {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
            {{--if (d.getElementById(id)) return;--}}
            {{--js = d.createElement(s); js.id = id;--}}
            {{--js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.8&appId=1837639056512329";--}}
            {{--fjs.parentNode.insertBefore(js, fjs);--}}
        {{--}(document, 'script', 'facebook-jssdk'));</script>--}}

    {{--{!!  Redis::get('google_tag_manager_body_code') !!}--}}

    <!-- Main Header -->
    @include($activeTheme . '::frontend.layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include($activeTheme . '::frontend.layouts.sidebar')

    @include($activeTheme . '::frontend.partials._messages')

    @yield('content')


    <!-- Main Footer -->
    @include($activeTheme . '::frontend.layouts.footer')


    {{--<script src="http://code.jquery.com/jquery.min.js"></script>--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

    <script src="{{ Theme::asset($activeTheme . '::js/bx-slider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/jquery.sticky.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/bx-slider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::type/script.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/custom.js') }}"></script>

    @yield('js')

    <script type="text/javascript">
        $('document').ready(function () {
            var slider = $('.bxslider').bxSlider({
                mode:'fade',
                speed:0,
                auto: true,
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>',
                onSliderLoad: function(){
                    // do funky JS stuff here
                    $('.bx-pager-link').on('hover',function (index) {
                        console.log(index);
                    });
                    $('.bx-pager-link').on("mouseover", function(index){
                        this.click();
                    });
                }
            });
            $('.bxcarousel').bxSlider({
                slideWidth: 219,
                minSlides: 2,
                maxSlides: 5,
                slideMargin: 15,
                auto:true,
                pager:false,
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>'
            });
            $('.m-slider1').bxSlider({
                mode:'fade',
                speed:0,
                pagerCustom: '#m_pg1',
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>'
            });
            $('.m-slider2').bxSlider({
                mode:'fade',
                speed:0,
                pagerCustom: '#m_pg2',
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>'
            });

            $("#sticky-container").sticky({
                topSpacing: $('header nav').outerHeight(),
                bottomSpacing: $('.ads').outerHeight() + $('footer').outerHeight()
            });
        });

    </script>
</body>
</html>


