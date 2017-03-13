@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="login-box">
                <div class="login-logo">
                    <a href="/"><b>Baz</b>NEWS</a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">{{trans('login.start')}}</p>

                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="{{trans('login.username')}}" value="{{ old('email') }}" name="email" id="email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="{{trans('login.password')}}" value="{{ old('password') }}" name="password" id="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember"> {{trans('login.remember')}}
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i> {{trans('login.signin')}}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form><!-- /form -->

                    <div class="social-auth-links text-center">
                        <p>- VEYA -</p>
                        <a href="{{ url('/login/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> {{trans('login.facebook_signin')}}</a>
                        <a href="{{ url('/login/twitter') }}" class="btn btn-block btn-social btn-twitter btn-flat"><i class="fa fa-twitter"></i> {{trans('login.twitter_signin')}}</a>
                        <a href="{{ url('/login/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> {{trans('login.google_signin')}}</a>
                    </div>
                    <!-- /.social-auth-links -->

                    <a href="{{ url('/password/reset') }}">{{trans('login.forgot_password')}}</a><br>
                    <a href="{{ url('/register') }}" class="text-center">{{trans('login.new_account')}}</a>

                </div><!-- /.login-box-body -->
                <!-- /.login-box-body -->
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /:container -->
@endsection

@section('js')
    <!-- jQuery 2.2.3 -->
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/css/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="/plugins/iCheck/icheck.js"></script>
    <script>
        //iChech Plugin
        $('#remember').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

    </script>
@endsection
