@extends($activeTheme .'::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('news::photo_gallery.management')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('photo_gallery.index') !!}"> {{ trans('news::photo_gallery.photo_galleries') }} </a></li>
                <li class="active"> {{ trans('news::common.add_update') }}</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>
    <!-- Main Content Element  Start-->
    <div class="row">

        @if(isset($record->id))
            {!! Form::model($record, ['route' => ['photo_gallery.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
        @else
            {!! Form::open(['route' => 'photo_gallery.store','method' => 'post', 'files' => 'true']) !!}
        @endif

        <div class="col-md-6">
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    {{--/<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('photo_category_id', trans('news::news.photo_category_id'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('photo_category_id', $photoCategories , $record->photo_category_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('title', trans('news::photo_gallery.title'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('title', $record->name, ['placeholder' => trans('news::photo_gallery.title') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('news::photo_gallery.slug'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('news::photo_gallery.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('short_url', trans('news::photo_gallery.short_url'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('short_url', $record->short_url, ['placeholder' => trans('news::photo_gallery.short_url') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('description', trans('news::photo_gallery.description'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::photo_gallery.description') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('keywords', trans('news::photo_gallery.keywords'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('keywords', $record->keywords, ['placeholder' => trans('news::photo_gallery.keywords') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('thumbnail', trans('news::photo_gallery.thumbnail'),['class'=> 'col-lg-2 control-label']) !!}


                            <div class="col-lg-10">
                                <img src="{{asset('/gallery/' . $record->id . '/photos/' . $record->thumbnail)}}">
                            </div>

                            {{--<div class="col-lg-10">--}}
                                {{--{!! Form::file('thumbnail') !!}--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::photo_gallery.is_cuff')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                                        <i></i> {{trans('news::photo_gallery.is_cuff')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::common.status')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                        <i></i> {{trans('news::common.is_active')}}
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
            </div>
        </div>

        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::photo_gallery.tags') }}</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    {{--<form role="form">--}}

                    {!!  Form::hidden('photo_gallery_id', $record->id) !!}

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('tags', trans('news::photo_gallery.tags'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('tags_ids[]', $tagList , $tagIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        {!! Form::close() !!}

    </div><!-- end row -->
    <!-- Main Content Element  End-->
</div><!-- end container-fluid -->
@endsection

@section('css')
    <link href="{{ Theme::asset('default-theme::AdminLTE/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ Theme::asset('default-theme::AdminLTE/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>
@endsection