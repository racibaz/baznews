<!DOCTYPE html>
<html>
<head>

    <!-- Tell the browser to be responsive to screen width -->


    {{--<meta name="google-site-verification" content="{{ Redis::get('google') }}"/>--}}
    {!! Redis::get('static_meta_tags') !!}
    @yield('meta_tags')

    <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <link href="{{ Theme::asset($activeTheme . '::AdminLTE/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link href="{{ Theme::asset($activeTheme . '::AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link href="{{ Theme::asset($activeTheme . '::AdminLTE/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ Theme::asset($activeTheme . '::AdminLTE/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">

    @yield('css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {!!  Redis::get('google_tag_manager_head_code') !!}
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.8&appId=1837639056512329";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<div class="wrapper">

    {!!  Redis::get('google_tag_manager_body_code') !!}

    <!-- Main Header -->
    @include($activeTheme . '::frontend.layouts.header')
            <!-- Left side column. contains the logo and sidebar -->
    {{--@include($activeTheme . '::frontend.layouts.sidebar')--}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<section class="content-header">--}}
            {{--<h1>--}}
                {{--Dashboard--}}
                {{--<small>Version 2.0</small>--}}
            {{--</h1>--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
                {{--<li class="active">Dashboard</li>--}}
            {{--</ol>--}}
        {{--</section>--}}

        <!-- Main content -->
        <section class="content">
            @include($activeTheme . '::frontend.partials._messages')
            @yield('content')
            @yield('widgets')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include($activeTheme . '::frontend.layouts.footer')

</div>
<!-- ./wrapper -->



<!-- jQuery 2.2.3 -->
{{--<script src="{{ Theme::asset($activeTheme . '::AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>--}}
<!-- Bootstrap 3.3.6 -->
<script src="{{ Theme::asset($activeTheme . '::AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ Theme::asset($activeTheme . '::AdminLTE/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ Theme::asset($activeTheme . '::AdminLTE/dist/js/app.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ Theme::asset($activeTheme . '::AdminLTE/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ Theme::asset($activeTheme . '::AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ Theme::asset($activeTheme . '::AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ Theme::asset($activeTheme . '::AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ Theme::asset($activeTheme . '::AdminLTE/plugins/chartjs/Chart.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ Theme::asset('default-theme::AdminLTE/dist/js/pages/dashboard2.js') }}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ Theme::asset($activeTheme . '::AdminLTE/dist/js/demo.js') }}"></script>

<script src="js/vendor.js"></script>

@yield('js')




</body>
</html>
