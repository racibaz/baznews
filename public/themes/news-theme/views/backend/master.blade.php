<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$siteTitle}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 3.3.6 -->
    <link href="{{ asset($themeAssetsPath . 'AdminLTE/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link href="{{ asset($themeAssetsPath . 'AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}"
          rel="stylesheet">
    <!-- Theme style -->

    @yield('css')

    <link href="{{ asset($themeAssetsPath . 'AdminLTE/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset($themeAssetsPath . 'AdminLTE/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">


    <link href="{{ asset($themeAssetsPath . 'js/summernote/dist/summernote.css') }}" rel="stylesheet">

    <link href="{{ asset($themeAssetsPath . 'js/icheck/skins/all.css') }}" rel="stylesheet">
    <link href="{{ asset($themeAssetsPath . 'css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div id="app">
    <div class="wrapper">

        <!-- Main Header -->
    @include($activeTheme . '::backend.layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include($activeTheme . '::backend.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        @yield('content-header')
        <!-- Main content -->
            <section class="content">
                @include($activeTheme . '::backend.partials._messages')
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
    @include($activeTheme . '::backend.layouts.footer')

    </div>
    <!-- ./wrapper -->
</div><!-- ./div app -->
@yield('frameworkApp')
<!-- jQuery 2.2.3 -->
<script src="{{ asset($themeAssetsPath . 'js/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{ asset($themeAssetsPath . 'AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset($themeAssetsPath . 'AdminLTE/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset($themeAssetsPath . 'AdminLTE/dist/js/app.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset($themeAssetsPath . 'AdminLTE/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset($themeAssetsPath . 'AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset($themeAssetsPath . 'AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset($themeAssetsPath . 'AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset($themeAssetsPath . 'AdminLTE/plugins/chartjs/Chart.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset($themeAssetsPath . 'AdminLTE/dist/js/pages/dashboard2.js') }}"></script>--}}
<!-- İCHECK -->
<script src="{{ asset($themeAssetsPath . 'js/icheck/icheck.min.js') }}"></script>
<!-- SUMMERNOTE -->
<script src="{{ asset($themeAssetsPath . 'js/summernote/dist/summernote.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset($themeAssetsPath . 'AdminLTE/dist/js/demo.js') }}"></script>
<script src="{{ asset($themeAssetsPath . 'js/functions.js') }}"></script>

@stack('js')


<script type="text/javascript">
    $(document).ready(function () {
        $('input[type=checkbox]').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square',
            increaseArea: '20%' // optional
        });
    });
</script>


</body>
</html>
