<!DOCTYPE html>
<html>
<head>

    @yield('meta_tags')
    {!! Redis::get('static_meta_tags') !!}

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link href="{{ Theme::asset($activeTheme . '::css/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ Theme::asset($activeTheme . '::js/jquery.bxslider/jquery.bxslider.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ Theme::asset($activeTheme . '::css/bootstrap-social.css') }}" type="text/css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ Theme::asset($activeTheme . '::css/style.css') }}" type="text/css" rel="stylesheet">

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

    @yield('content')


    <!-- Main Footer -->
    @include($activeTheme . '::frontend.layouts.footer')

    <!-- jQuery library (served from Google) -->
    <script src="{{ Theme::asset($activeTheme . '::js/jquery/jquery.js') }}"></script>

    <script src="{{ Theme::asset($activeTheme . '::js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/jquery.sticky.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::type/script.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/custom.js') }}"></script>

    @yield('js')


</body>
</html>


