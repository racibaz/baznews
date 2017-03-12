@extends('layouts.app')

<!-- Main Content -->
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
                    <p class="login-box-msg">{{trans('login.forgot_password_mail_title')}}</p>

                    <form role="form" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="{{trans('login.mail')}}" value="{{ old('email') }}" name="email" id="email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-send-o"></i> {{trans('login.send_password')}}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form><!-- /form -->

                </div><!-- /.login-box-body -->
                <!-- /.login-box-body -->
            </div><!-- /.col -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container -->
@endsection
