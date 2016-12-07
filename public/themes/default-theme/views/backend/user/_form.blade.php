@extends($activeTheme . '::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('user.managment')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('user.index') !!}"> {{ trans('user.users') }} </a></li>
                <li class="active">{{trans('user.user_form')}}</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['user.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'user.store','method' => 'post', 'files' => 'true']) !!}
    @endif

    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    {{--<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('name', "Kullanıcı Adı",['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('name', $record->name, ['placeholder' => 'Kullanıcı Adı','class' => 'form-control']) !!}
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
                            {!! Form::label('slug', trans('user.slug'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->slug,['placeholder' => trans('user.slug'), 'class' => 'form-control']) !!}
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
                            {!! Form::label('blood_type', trans('user.blood_type'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('blood_type', $record->blood_type, ['placeholder' => trans('user.blood_type'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('avatar', trans('user.avatar'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('avatar', $record->avatar, ['placeholder' => trans('user.avatar'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('user.sex')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('sex', null , $record->is_active) !!}

                                        <i></i> {{trans('user.sex')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('user.status')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                        <i></i> {{trans('user.status')}}
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
                {{--{!! Form::close() !!}--}}
            </div>
        </div>
    </div><!-- end row -->


    <div class="col-md-6">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Kullanıcı Rol Yonetimi</h3>
            </div>

        <!-- /.box-header -->
            <div class="box-body">

                @foreach($roles as $role)
                    <div class="form-group">
                        {{ $role->name }} :
                        {!! Form::checkbox('role_user_store_[]', $role->id, in_array($role->id , $record->roles->pluck('id')->toArray())) !!}
                    </div>
                @endforeach

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Kullanıcı Grup Yonetimi</h3>
            </div>

        <!-- /.box-header -->
            <div class="box-body">
                {{--<form role="form">--}}

                @foreach($groups as $group)
                    <div class="form-group">
                        {{ $group->name }} :
                        {!! Form::checkbox('group_user_store_[]', $group->id, in_array($group->id , $record->groups->pluck('id')->toArray())) !!}
                    </div>
                @endforeach

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


    {!! Form::close() !!}



    <!-- Main Content Element  End-->
</div><!-- end container-fluid -->
@endsection