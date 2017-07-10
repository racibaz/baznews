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
                                        <?php
                                        $default = asset('default_user_avatar.jpg');
                                        $size = 40;
                                        $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($record->email))) . "?d=" . urlencode($default) . "&s=" . $size;
                                        ?>
                                        <img src="<?php echo $grav_url; ?>" alt="" class="img-rounded"/>
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
                <div class="account-edit">
                    <div class="title-section">
                        <h1>
                            <span>Kullanıcı Bilgilerini Düzenle</span>
                        </h1>
                    </div>
                    <div class="module">
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
                        {!! Form::model($record, ['route' => ['account.update', $record], 'method' => 'PATCH']) !!}
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('name', "Kullanıcı Adı",['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {{  $record->name }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('email', "E-Posta",['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {{  $record->email }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('country_id', "Ülke",['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::select('country_id', $countries , $record->country_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('city_id', "Şehir",['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::select('city_id', $cities , $record->city_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('cell_phone', trans('user.cell_phone'), ['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('cell_phone', $record->cell_phone,['placeholder' => trans('user.cell_phone'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('facebook', trans('user.facebook'), ['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('facebook', $record->facebook,['placeholder' => trans('user.facebook'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('twitter', trans('user.twitter'), ['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('twitter', $record->cell_phone,['placeholder' => trans('user.twitter'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('pinterest', trans('user.pinterest'), ['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('pinterest', $record->pinterest,['placeholder' => trans('user.pinterest'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('linkedin', trans('user.linkedin'), ['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('linkedin', $record->linkedin,['placeholder' => trans('user.linkedin'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('youtube', trans('user.youtube'), ['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('youtube', $record->youtube, ['placeholder' => trans('user.youtube'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('web_site', trans('user.web_site'), ['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('web_site', $record->web_site, ['placeholder' => trans('user.web_site'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        @if(!empty($record->id))
                            <div class="form-group">
                                <div class="row">
                                    {!! Form::label('avatar', trans('user.avatar'), ['class'=> 'col-lg-2 control-label']) !!}

                                    <div class="col-lg-10">
                                        <img src="{{$userAvatar}}" alt=""/>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('bio_note', trans('user.bio_note'), ['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('bio_note', $record->bio_note, ['placeholder' => trans('user.bio_note'), 'class' => 'form-control']) !!}
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

                        {!! Form::close() !!}

                    </div><!-- /.module -->
                </div><!-- /.account-edit -->
            </div>
        </div>
    </article><!-- /.article -->
@endsection

@section('meta_tags')
    <title> {{ $record->name }}  </title>
@endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme .'::AdminLTE/plugins/select2/select2.min.css')}}">
@endsection
@section('js')
    <!-- Select2 -->
    <script src="{{ Theme::asset($activeTheme .'::AdminLTE/plugins/select2/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        //Initialize Select2 Elements
        $(".select2").select2();
    </script>
@endsection