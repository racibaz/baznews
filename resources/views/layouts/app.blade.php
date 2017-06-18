<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"><!-- Bootstrap WebPack... -->
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/AdminLTE/css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/AdminLTE/css/alt/AdminLTE-bootstrap-social.css') }}" rel="stylesheet">
    <!-- İCHECK -->
    <link href="{{ asset('plugins/icheck/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="hold-transition login-page">
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- İCHECK -->
<script src="{{ asset('plugins/icheck/icheck.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('css/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('css/AdminLTE/js/demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('input[type=checkbox]').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square',
            increaseArea: '20%' // optional
        });
        var privacy = $('.privacy-done');
        if(privacy.length>0){
            privacy.click(function () {
                $('#privacyCheck').iCheck('check');
                $('#register').modal('hide');
            });
        }
    });

</script>
</body>
</html>
