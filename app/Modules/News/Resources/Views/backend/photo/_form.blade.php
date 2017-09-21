@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo.management')}}
            <small>{{trans('news::photo.news_create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('photo.index') !!}">{{trans('news::photo.management')}}</a></li>
            <li class="active">{{trans('news::photo.news_create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['photo.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'photo.store','method' => 'post', 'files' => 'true']) !!}
    @endif

    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-lg-8" id="content">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::photo.news_create_edit')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('name', trans('news::photo.name'),['class'=> 'control-label']) !!}
                        {!! Form::text('name', $record->name, ['placeholder' => trans('news::photo.name') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo_gallery_id', trans('news::photo.photo_gallery'),['class'=> 'control-label']) !!}
                        {!! Form::select('photo_gallery_id', $photoGalleryList , $record->photo_gallery_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', trans('news::photo.content'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('content', $record->description, ['placeholder' => trans('news::photo.content') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('slug', trans('news::photo.slug'),['class'=> 'control-label']) !!}
                                {!! Form::text('slug', $record->url, ['placeholder' => trans('news::photo.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('link', trans('news::photo.link'),['class'=> 'control-label']) !!}
                                {!! Form::text('link', $record->link, ['placeholder' => trans('news::photo.link') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('order', trans('news::photo.order'),['class'=> 'control-label']) !!}
                                {!! Form::number('order', $record->order, ['placeholder' => trans('news::photo.order') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_comment', null , $record->is_comment) !!}
                            {{trans('common.is_comment')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('common.is_active')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i
                                    class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-4" id="sidebar">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::photo.photo')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('file', trans('news::photo.file'),['class'=> 'control-label','style'=>'width:100%']) !!}
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                 style="width: 200px; height: 150px;">
                                <img src="{{ asset('photos/' . $record->id . '/224x195_' . $record->file)}}"
                                     alt="{{$record->name}}"/>
                            </div>
                            <div>
                                <span class="btn btn-default btn-file"><span
                                            class="fileinput-new">{{trans('news::photo.select_image')}}</span><span
                                            class="fileinput-exists">{{trans('news::photo.change')}}</span>{!! Form::file('file') !!}</span>
                                <a href="#" class="btn btn-default fileinput-exists"
                                   data-dismiss="fileinput">{{trans('news::photo.remove')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::photo.keywords')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('keywords', trans('news::photo.keywords'),['class'=> 'control-label','style'=>'width:100%']) !!}
                        {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('news::photo.keywords') ,'class' => 'form-control tagsinput']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-lg-6 -->

    </div><!-- end row -->
    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.fileinput').fileinput();
            $('.select2').select2();
            $('.tagsinput').tagsinput();
        });
        $(window).resize(function () {
            $('.select2').select2();
            $('.tagsinput').tagsinput();
        });
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
        //active menu
        activeMenu('photo', 'news_management');
    </script>
@endpush