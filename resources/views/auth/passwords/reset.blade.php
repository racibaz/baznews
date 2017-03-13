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
                    <p class="login-box-msg">{{trans('login.reset_password_title')}}</p>

                    <form role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="{{trans('login.mail')}}" value="{{ old('email') }}" name="email" id="email">
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
                        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="{{trans('login.confirm_password')}}" value="{{ old('password_confirmation') }}" name="password_confirmation" id="password_confirmation">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{trans('login.reset_password')}}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form><!-- /form -->

                </div><!-- /.login-box-body -->
                <!-- /.login-box-body -->
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container -->
@endsection
