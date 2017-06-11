@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="register-box">
                <div class="register-logo">
                    <a href="{{ url('/') }}"><b>Bazz</b>NEWS</a>
                </div>

                <div class="register-box-body">
                    <p class="login-box-msg">{{trans('login.signup_title')}}</p>

                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" placeholder="{{trans('login.name')}}"  name="name" value="{{ old('name') }}" id="name" autofocus>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="{{trans('login.mail')}}" name="email" value="{{ old('email') }}" id="email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="{{trans('login.password')}}" name="password" id="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="{{trans('login.confirm_password')}}" name="password_confirmation" id="password-confirm">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"> <a data-toggle="modal" href="#register">{{trans('login.user_contract')}}</a> {{trans('login.accept')}}
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-save"></i> {{trans('login.register')}}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form><!-- /form -->

                    <div class="social-auth-links text-center">
                        <p>- VEYA -</p>
                        <a href="{{ url('/login/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> {{trans('login.facebook_signin')}}</a>
                        <a href="{{ url('/login/twitter') }}" class="btn btn-block btn-social btn-twitter btn-flat"><i class="fa fa-twitter"></i> {{trans('login.twitter_signin')}}</a>
                        <a href="{{ url('/login/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> {{trans('login.google_signin')}}</a>
                    </div><!-- /.social-auth-links -->

                    <a href="{{ url('/login') }}" class="text-center">{{trans('login.have_member')}}</a>
                </div>
                <!-- /.form-box -->
            </div>
            <!-- /.register-box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

</div><!-- /.container -->
<div class="modal fade" id="register">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Kullanım Sözleşmesi</h4>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis deserunt dolorum fugit laboriosam
                    necessitatibus omnis! Accusantium commodi doloribus et explicabo minus, molestias numquam odio
                    officiis placeat recusandae saepe suscipit voluptas!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus impedit laborum quasi
                    quia reprehenderit veniam. Beatae consequuntur, deserunt eveniet necessitatibus neque unde. Dolorem
                    ipsa nesciunt nostrum, repellat suscipit voluptatibus?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kabul etmiyorum.</button>
                <button type="button" class="btn btn-primary">Kabul ediyorum.</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
        $('.icheck').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

    </script>
@endsection
