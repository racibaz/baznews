@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::video_gallery.management')}}
            <small>{{trans('news::video_gallery.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('video_gallery.index') !!}">{{trans('news::video_gallery.management')}}</a></li>
            <li class="active">{{trans('news::video_gallery.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['video_gallery.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'video_gallery.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-lg-8">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::video_gallery.video_gallery_create')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('video_category_id', trans('news::video_gallery.video_category_id'),['class'=> 'control-label']) !!}
                                {!! Form::select('video_category_id', $videoCategories , $record->video_category_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('title', trans('news::video_gallery.title'),['class'=> 'control-label']) !!}
                                {!! Form::text('title', $record->name, ['placeholder' => trans('news::video_gallery.title') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('slug', trans('news::video_gallery.slug'),['class'=> 'control-label']) !!}
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('news::video_gallery.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('short_url', trans('news::video_gallery.short_url'),['class'=> 'control-label']) !!}
                                {!! Form::text('short_url', $record->short_url, ['placeholder' => trans('news::video_gallery.short_url') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('news::video_gallery.description'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::video_gallery.description') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('keywords', trans('news::video_gallery.keywords'),['class'=> 'control-label','style'=>'width:100%']) !!}
                        {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('news::video_gallery.keywords') ,'class' => 'form-control tagsinput']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::video_gallery.status')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                            {{trans('news::video_gallery.is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('news::common.is_active')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::photo_gallery.thumbnail')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('thumbnail', trans('news::photo_gallery.thumbnail'),['class'=> 'control-label','style'=>'width:100%']) !!}
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">

                            </div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">{{trans('news::video.select_image')}}</span><span class="fileinput-exists">{{trans('news::video.change')}}</span>{!! Form::file('thumbnail') !!}</span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{trans('news::video.remove')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->

    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme.'::AdminLTE/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme.'::js/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme.'::js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme.'::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme.'::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme.'::AdminLTE/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme.'::js/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme.'::js/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
            $('.fileinput').fileinput();
            $('.tagsinput').tagsinput();
            /*--------------------------------------------------------
             Sticky Sidebar
             * --------------------------------------------------------*/
            jQuery(document).ready(function() {
                jQuery('#sidebar,#content').theiaStickySidebar();
            });
            //active menu
            activeMenu('video_gallery','news_management');
        });
    </script>
@endsection