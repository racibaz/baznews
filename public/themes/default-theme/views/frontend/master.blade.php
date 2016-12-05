<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ Redis::get('title') }} </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <meta name="google-site-verification" content="{{ Redis::get('google') }}"/>
    @yield('meta_tags')
    <meta name="robots" content="{{ Redis::get('robots') }}">
    <meta name="subject" content="{{ Redis::get('title') }}">
    <meta name="copyright" content="{{ Redis::get('copyright') }}">
    <meta name="language" content="{{ Redis::get('language') }}">
    <meta name="robots" content="{{ Redis::get('robots') }}" />
    <meta name="Classification" content="{{ Redis::get('robots') }}">
    <meta name="reply-to" content="{{ Redis::get('reply-to') }}">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="{{ Redis::get('revisit-after') }}">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="designer" content="{{ Redis::get('designer') }}">
    <meta name="owner" content="{{ Redis::get('owner') }}">
    <meta name="url" content="{{ Redis::get('url') }}">
    <meta name="identifier-URL" content="http://www.websiteaddress.com">
    <meta name="directory" content="submission">
    {{--<meta http-equiv="refresh" content="30">--}}


    {{--<meta name="abstract" content="">--}}
    {{--<meta name="topic" content="">--}}
    {{--<meta name="summary" content="">--}}
    {{--<meta name="category" content="">--}}
    {{--<meta name="author" content="name, email@hotmail.com">--}}
    {{--<meta name="revised" content="Sunday, July 18th, 2010, 5:15 pm" />--}}
    {{--<meta name='pagename' content='jQuery Tools, Tutorials and Resources - O Reilly Media'>--}}
    {{--<meta name='subtitle' content='This is my subtitle'>--}}
    {{--<meta name="author" content="Hege Refsnes">--}}



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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    @include($activeTheme . '::frontend.layouts.header')
            <!-- Left side column. contains the logo and sidebar -->
    @include($activeTheme . '::frontend.layouts.sidebar')

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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

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
