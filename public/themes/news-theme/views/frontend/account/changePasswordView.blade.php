@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h1><span>{{trans('account.management')}}</span></h1>
                </div>
                <div class="module">
                    <div class="account">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="account-img text-center">
                                    @if(!empty($record->id))
                                        <img src="{{\App\Models\User::getUserAvatar(Auth::user()->email, 40)}}" alt="" class="img-rounded"/>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <h2 class="account-name"><i class="fa fa-user"></i> {{$record->name}} </h2>
                                    <p><i class="fa fa-envelope"></i> {{$record->email}}</p>
                                    {!! link_to_route('account.edit', trans('account.edit'), $record, ['class' => 'btn btn-primary'] ) !!}
                                    {!! link_to_route('change_password_view', trans('account.change_password'), $record, ['class' => 'btn btn-info'] ) !!}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <p>
                                    @permission('index-admin')
                                    <a href="{{route('dashboard')}}" class="btn btn-success btn-block">
                                        <i class="fa fa-window-restore"></i> {{trans('account.show_dashboard')}}
                                    </a>
                                    @endpermission
                                </p>
                                <p>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                       class="btn btn-danger btn-block">
                                        <i class="fa fa-sign-out"></i>{{trans('account.logout')}}
                                    </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </p>
                            </div>
                        </div>
                    </div><!-- /.account -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="title-section">
                    <h1>
                        <span>Kullanıcı Bilgileri</span>
                    </h1>
                </div>
                <div class="user-password module">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('success_messages'))
                        <div class="alert alert-success">
                            {{ Session::get('success_messages') }}
                        </div>
                    @endif
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    @if(Session::has('error_message'))
                        <div class="alert alert-danger">
                            {{ Session::get('error_message') }}
                        </div>
                    @endif

                    {!! Form::model($record, ['route' => ['change_password', $record], 'method' => 'POST']) !!}
                    <div class="user-forms">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('password', trans('user.password'), ['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::password('password', array('placeholder' => trans('user.password'), 'class'=>'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('password_confirmation', trans('user.password_confirmation') ,['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::password('password_confirmation', array('placeholder' => trans('user.password_confirmation'), 'class'=>'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success" type="submit"><i
                                                class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.col -->
        </div><!-- end row -->
        <!-- Main Content Element  End-->
    </article><!-- /.article -->
@endsection