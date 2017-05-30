@extends($activeTheme . '::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('account.management')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('account.index') !!}"> {{ trans('account.profil') }} </a></li>
                <li class="active"> {{ trans('common.add_update') }}</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>


    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['account.update', $record], 'method' => 'PATCH']) !!}
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
                            {!! Form::label('name', trans('account.name'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                               {{$record->name}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('email', trans('account.email'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {{$record->email}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('password', trans('account.password'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::password('password', array('placeholder' => trans('account.password'), 'class'=>'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('password_confirmation', trans('account.password_confirmation') ,['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::password('password_confirmation', array('placeholder' => trans('account.password_confirmation'), 'class'=>'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('country_id', trans('account.country'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('country_id', $countries , $record->country_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('city_id', trans('account.city'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('city_id', $cities , $record->city_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('account.slug'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->slug,['placeholder' => trans('account.slug'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('cell_phone', trans('account.cell_phone'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('cell_phone', $record->cell_phone,['placeholder' => trans('account.cell_phone'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('facebook', trans('account.facebook'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('facebook', $record->facebook,['placeholder' => trans('account.facebook'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('twitter', trans('account.twitter'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('twitter', $record->cell_phone,['placeholder' => trans('account.twitter'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('linkedin', trans('account.linkedin'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('linkedin', $record->linkedin,['placeholder' => trans('account.linkedin'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('youtube', trans('account.youtube'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('youtube', $record->youtube, ['placeholder' => trans('account.youtube'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('web_site', trans('account.web_site'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('web_site', $record->web_site, ['placeholder' => trans('account.web_site'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('bio_note', trans('account.bio_note'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('bio_note', $record->bio_note, ['placeholder' => trans('account.bio_note'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('account.sex')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('sex', null , $record->sex) !!}

                                        <i></i> {{trans('account.sex')}}
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
    <!-- Main Content Element  End-->
    {!! Form::close() !!}
</div><!-- end container-fluid -->
@endsection