@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('user.user_management')}}
            <small>{{trans('user.user_edit_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('user.index') !!}"> {{ trans('user.users') }} </a></li>
            <li class="active">{{trans('user.user_edit_create')}}</li>
        </ol>
    </section>

@endsection
@section('content')

    <!-- Main Content Element  Start-->

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['user.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'user.store','method' => 'post', 'files' => 'true']) !!}
    @endif

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Genel Bilgiler</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::label('name', "Kullanıcı Adı",['class'=> 'control-label']) !!}
                                {!! Form::text('name', $record->name, ['placeholder' => 'Kullanıcı Adı','class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', "E-Posta",['class'=> 'control-label']) !!}
                                {!! Form::email('email', $record->email, ['class' => 'form-control','placeholder' => "E-Posta"]) !!}
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box-default -->

                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Diğer</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::label('country_id', "Ülke",['class'=> 'control-label']) !!}
                                {!! Form::select('country_id', $countries , $record->country_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('city_id', "Şehir",['class'=> 'control-label']) !!}
                                {!! Form::select('city_id', $cities , $record->city_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('slug', trans('user.slug'), ['class'=> 'control-label']) !!}
                                {!! Form::text('slug', $record->slug,['placeholder' => trans('user.slug'), 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cell_phone', trans('user.cell_phone'), ['class'=> 'control-label']) !!}
                                {!! Form::text('cell_phone', $record->cell_phone,['placeholder' => trans('user.cell_phone'), 'class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('blood_type', trans('user.blood_type'), ['class'=> 'control-label']) !!}
                                {!! Form::text('blood_type', $record->blood_type, ['placeholder' => trans('user.blood_type'), 'class' => 'form-control']) !!}
                            </div>
                            @if(!empty($record->id))
                                <?php
                                $default = Redis::get('url') . "/default_user_avatar.jpg";
                                $size = 40;
                                $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $record->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
                                ?>
                                <div class="form-group">
                                    <div class="row">
                                        {!! Form::label('avatar', trans('user.avatar'), ['class'=> 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            <img src="<?php echo $grav_url; ?>" alt="" />
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                {!! Form::label('bio_note', trans('user.bio_note'), ['class'=> 'control-label']) !!}
                                {!! Form::textarea('bio_note', $record->bio_note, ['placeholder' => trans('user.bio_note'), 'class' => 'form-control summernote','rows'=>'10']) !!}
                            </div>
                            <div class="form-group">
                                <label for="0">
                                    {!! Form::checkbox('sex', null , $record->sex) !!}
                                    {{trans('user.sex')}}
                                </label>
                            </div><!-- /.form-group -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div><!-- /.col -->
                <div class="col-md-6">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Şifre Değiştir</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::label('password', trans('user.password'), ['class'=> 'control-label']) !!}
                                {!! Form::password('password', array('placeholder' => trans('user.password'), 'class'=>'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password_confirmation', trans('user.password_confirmation') ,['class'=> 'control-label']) !!}
                                {!! Form::password('password_confirmation', array('placeholder' => trans('user.password_confirmation'), 'class'=>'form-control')) !!}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sosyal</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <i class="fa fa-facebook-square"></i> {!! Form::label('facebook', trans('user.facebook'), ['class'=> 'control-label']) !!}
                                {!! Form::text('facebook', $record->facebook,['placeholder' => trans('user.facebook'), 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <i class="fa fa-twitter-square"></i> {!! Form::label('twitter', trans('user.twitter'), ['class'=> 'control-label']) !!}
                                {!! Form::text('twitter', $record->cell_phone,['placeholder' => trans('user.twitter'), 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <i class="fa fa-pinterest-square"></i> {!! Form::label('pinterest', trans('user.pinterest'), ['class'=> 'control-label']) !!}
                                {!! Form::text('pinterest', $record->pinterest,['placeholder' => trans('user.pinterest'), 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <i class="fa fa-linkedin-square"></i> {!! Form::label('linkedin', trans('user.linkedin'), ['class'=> 'control-label']) !!}
                                {!! Form::text('linkedin', $record->linkedin,['placeholder' => trans('user.linkedin'), 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <i class="fa fa-youtube-square"></i> {!! Form::label('youtube', trans('user.youtube'), ['class'=> 'control-label']) !!}
                                {!! Form::text('youtube', $record->youtube, ['placeholder' => trans('user.youtube'), 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <i class="fa fa-globe"></i> {!! Form::label('web_site', trans('user.web_site'), ['class'=> 'control-label']) !!}
                                {!! Form::text('web_site', $record->web_site, ['placeholder' => trans('user.web_site'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Durum</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('status', trans('news::news.status'),['class'=> 'control-label']) !!}
                        {!! Form::select('status', $statusList , $record->status , ['placeholder' => trans('user.please_choose'),'class' => 'form-control']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Rol Yönetimi</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach($roles as $role)
                        <div class="form-group">
                            <label for="{{$role->id }}">
                                {!! Form::checkbox('role_user_store_[]', $role->id, in_array($role->id , $record->roles->pluck('id')->toArray())) !!}
                                &nbsp;&nbsp;{{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Grup Yönetimi</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach($groups as $group)
                        <div class="form-group">
                            <label for="{{$group->id }}">
                                {!! Form::checkbox('group_user_store_[]', $group->id, in_array($group->id , $record->groups->pluck('id')->toArray())) !!}
                                &nbsp;&nbsp;{{ $group->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
    {!! Form::close() !!}
    <!-- Main Content Element  End-->
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote();
        });
        //active menu
        activeMenu('user_management','user');
    </script>
@endsection