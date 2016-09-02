@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">Kullanıcı Ekle / Düzenle</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('admin.user.index') !!}">Kullanıcılar</a></li>
                <li class="active">Kullanıcı Ekle / Düzenle</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    <h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>
                </div>

                @if(isset($record->id))
                    {!! Form::model($record, ['route' => ['admin.user.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
                @else
                    {!! Form::open(['route' => 'admin.user.store','method' => 'post', 'files' => 'true']) !!}
                @endif

                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('first_name', "Kullanıcı Adı",['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('first_name', $record->first_name, ['placeholder' => 'Kullanıcı Adı','class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('last_name', "Kullanıcı Soyadı",['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('last_name', $record->last_name, ['placeholder' => 'Kullanıcı Soaydı','class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('email', "E-Posta",['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::email('email', $record->email, ['class' => 'form-control','placeholder' => "E-Posta"]) !!}
                            </div>
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                    {{--<div class="row">--}}
                    {{--{!! Form::label('password', "Şifre",['class'=> 'col-lg-2 control-label']) !!}--}}

                    {{--<div class="col-lg-10">--}}
                    {{--{!! Form::password('password', array('placeholder' => 'Şifre','class'=>'form-control')) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                    {{--<div class="row">--}}
                    {{--{!! Form::label('password_confirmation', "Şifre Tekrarı",['class'=> 'col-lg-2 control-label']) !!}--}}

                    {{--<div class="col-lg-10">--}}
                    {{--{!! Form::password('password_confirmation', array('placeholder' => 'Şifre Tekrarı','class'=>'form-control')) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
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
                            {!! Form::label('phone_number', "Telefon Numarası",['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('phone_number', $record->phone_number,['placeholder' => 'Telefon Numarası','class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {{--{!! Form::checkbox('is_active', 'value', true, array('class' => 'name')) !!}--}}
                                        {!! Form::checkbox('status', null , $record->status) !!}
                                        <i></i> Status
                                    </label>
                                </div>
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

        {{--<div class="col-md-6">--}}
        {{--<div class="panel panel-red">--}}
        {{--<div class="panel-heading">--}}
        {{--<h3 class="panel-title">Kullanıcı Rolleri</h3>--}}
        {{--</div>--}}
        {{--<div class="panel-body">--}}
        {{--<form class="form-horizontal ls_form ls_form_horizontal">--}}
        {{--{!! Form::open(['route' => 'role_user_store','method' => 'post']) !!}--}}

        {{--<div class="form-group">--}}
        {{--<label class="col-lg-2 control-label">Kullanıcı Rolleri</label>--}}

        {{--<div class="col-lg-10">--}}

        {{--{!!  Form::hidden('user_id', $record->id) !!}--}}

        {{--@foreach($roles as $role)--}}
        {{--<div class="form-group">--}}
        {{--{{ $role->name }} :--}}
        {{--{!! Form::checkbox($role->id, $role->id, in_array($role->id , $record->roles->lists('id')->toArray())) !!}--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<div class="col-lg-offset-2 col-lg-10">--}}
        {{--<button class="btn btn-sm btn-default" type="submit">Kaydet</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--{!! Form::close() !!}--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-6">--}}
        {{--<div class="panel panel-light-green">--}}
        {{--<div class="panel-heading">--}}
        {{--<h3 class="panel-title">Kullanıcı Grupları</h3>--}}
        {{--</div>--}}
        {{--<div class="panel-body">--}}
        {{--<form class="form-horizontal ls_form ls_form_horizontal">--}}
        {{--{!! Form::open(['route' => 'group_user_store','method' => 'post']) !!}--}}
        {{--<div class="form-group">--}}
        {{--<label class="col-lg-2 control-label">Kullanıcı Grupları</label>--}}

        {{--<div class="col-lg-10">--}}

        {{--{!!  Form::hidden('user_id', $record->id) !!}--}}

        {{--@foreach($groups as $group)--}}
        {{--<div class="form-group">--}}
        {{--{{ $group->name }} :--}}
        {{--{!! Form::checkbox($group->name, $group->id, in_array($group->name , $record->groups->lists('name')->toArray())) !!}--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<div class="col-lg-offset-2 col-lg-10">--}}
        {{--<button class="btn btn-sm btn-default" type="submit">Kaydet</button>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--{!! Form::close() !!}--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div><!-- end row -->
    <!-- Main Content Element  End-->
</div><!-- end container-fluid -->
@endsection