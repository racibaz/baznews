@extends($activeTheme . '::frontend.master')

@section('content')

    <article class="container" id="container">

        <div class="container-fluid">
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<!--Top header start-->--}}
                    {{--<h3 class="ls-top-header">{{trans('user.managment')}}</h3>--}}
                    {{--<!--Top header end -->--}}

                    {{--<!--Top breadcrumb start -->--}}
                    {{--<ol class="breadcrumb">--}}
                        {{--<li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>--}}
                        {{--<li><a href="{!! URL::route('user.index') !!}"> {{ trans('user.users') }} </a></li>--}}
                        {{--<li class="active">{{trans('user.user_form')}}</li>--}}
                    {{--</ol>--}}
                    {{--<!--Top breadcrumb start -->--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- Main Content Element  Start-->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-light-blue">
                        <div class="panel-heading">
                            {{--<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                        </div>


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

                        <div class="panel-body">
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
                                    {!! Form::label('country_id', "Ülke",['class'=> 'col-lg-2 control-label']) !!}

                                    <div class="col-lg-10">
                                        {!! Form::select('country_id', $countries , $record->country_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    {!! Form::label('city_id', "Şehir",['class'=> 'col-lg-2 control-label']) !!}

                                    <div class="col-lg-10">
                                        {!! Form::select('city_id', $cities , $record->city_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
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
                            <div class="form-group">
                                <div class="row">
                                    {!! Form::label('blood_type', trans('user.blood_type'), ['class'=> 'col-lg-2 control-label']) !!}

                                    <div class="col-lg-10">
                                        {!! Form::text('blood_type', $record->blood_type, ['placeholder' => trans('user.blood_type'), 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
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
                                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!-- end row -->
            <!-- Main Content Element  End-->
        </div><!-- end container-fluid -->
    </article><!-- /.article -->
@endsection