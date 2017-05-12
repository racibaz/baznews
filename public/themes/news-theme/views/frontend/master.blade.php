<!DOCTYPE html>
<html>
<head>

    @yield('meta_tags')

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link href="{{ Theme::asset($activeTheme . '::css/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ Theme::asset($activeTheme . '::js/bxslider/dist/jquery.bxslider.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ Theme::asset($activeTheme . '::css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ Theme::asset($activeTheme . '::js/video-js/video-js.min.css') }}" rel="stylesheet">
    {{--<link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900&amp;subset=latin-ext" rel="stylesheet">--}}

    @yield('css')

    <link href="{{ Theme::asset($activeTheme . '::css/style.css') }}" type="text/css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {!! Cache::tags('Setting')->get('head_code') !!}
</head>
<body>
<div class="wrapper">
    {{--<div id="fb-root"></div>--}}
    {{--<script>(function(d, s, id) {--}}
    {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
    {{--if (d.getElementById(id)) return;--}}
    {{--js = d.createElement(s); js.id = id;--}}
    {{--js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.8&appId=1837639056512329";--}}
    {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));</script>--}}

    {{--{!!  Cache::tags('Setting')->get('google_tag_manager_body_code') !!}--}}

    <!-- Main Header -->
    @include($activeTheme . '::frontend.layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include($activeTheme . '::frontend.layouts.sidebar')

    @yield('content')

    <!-- Main Footer -->
    @include($activeTheme . '::frontend.layouts.footer')
</div>

    <!-- jQuery library (served from Google) -->
    <script src="{{ Theme::asset($activeTheme . '::js/jquery/jquery.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/bxslider/dist/jquery.bxslider.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/jquery.sticky.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/custom.js') }}"></script>
    {!! Cache::tags('Setting')->get('footer_code') !!}

    @yield('js')

    @stack('js')

</body>
</html>


