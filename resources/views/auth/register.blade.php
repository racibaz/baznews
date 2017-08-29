@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="register-box">
                <div class="register-logo">
                    <a href="{{ url('/') }}">{{env('APP_NAME')}}</a>
                </div>

                <div class="register-box-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <p class="login-box-msg">{{trans('login.signup_title')}}</p>

                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" placeholder="{{trans('login.name')}}"  name="name" value="{{ old('name') }}" id="name" autofocus required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="{{trans('login.mail')}}" name="email" value="{{ old('email') }}" id="email" required>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="{{trans('login.password')}}" name="password" id="password" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="{{trans('login.confirm_password')}}" name="password_confirmation" id="password-confirm" required>
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <div class="row">
                            @if(Cache::tags('Setting')->get('user_contract_force'))
                                <div class="col-xs-8">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox" class="privacy-check" name="user_contract" id="user_contract" > <a data-toggle="modal" href="#register">{{trans('login.user_contract')}}</a> {{trans('login.accept')}}
                                        </label>
                                    </div>
                                </div>
                            @endif
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
                <h4 class="modal-title">{{trans('setting.user_contract')}}</h4>
            </div>
            <div class="modal-body">
                {{Cache::tags('Setting')->get('user_contract')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default privacy-cancel" data-dismiss="modal">Kabul etmiyorum.</button>
                <button type="button" class="btn btn-primary privacy-done">Kabul ediyorum.</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

