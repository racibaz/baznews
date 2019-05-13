@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::video.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('video.index') !!}">{{trans('news::video.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['video.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'video.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <div class="row">
        <div class="col-lg-8" id="content">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('common.create_edit')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('video_category_id', trans('news::video.video_category_id'),['class'=> 'control-label']) !!}
                        {!! Form::select('video_category_id', $videoCategoryList , $record->video_category_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('video_gallery_id', trans('news::video.video_gallery_id'),['class'=> 'control-label']) !!}
                        {!! Form::select('video_gallery_id', $videoGalleryList , $record->video_gallery_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', trans('news::video.name'),['class'=> 'control-label']) !!}
                        {!! Form::text('name', $record->name, ['placeholder' => trans('news::video.name') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', trans('common.slug'),['class'=> 'control-label']) !!}
                        {!! Form::text('slug', $record->url, ['placeholder' => trans('common.slug') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('thumbnail', trans('common.thumbnail'),['class'=> 'control-label','style'=>'width:100%;']) !!}

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                 style="width: 200px; height: 150px;">
                                <img src="{{ asset('videos/' . $record->id . '/224x195_' . $record->thumbnail)}}"
                                     alt="{{$record->title}}"/>
                            </div>
                            <div>
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">{{trans('news::video.select_image')}}</span>
                                    <span class="fileinput-exists">{{trans('news::video.change')}}</span>
                                    {!! Form::file('thumbnail') !!}
                                </span>
                                <a href="#" class="btn btn-default fileinput-exists"
                                   data-dismiss="fileinput">{{trans('news::video.remove')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', trans('news::video.link'),['class'=> 'control-label']) !!}
                        {!! Form::text('link', $record->link, ['placeholder' => trans('news::video.link') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('embed', trans('news::video.embed'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('embed', $record->embed, ['placeholder' => trans('news::video.embed') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', trans('common.content'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('content', $record->content, ['placeholder' => trans('common.content') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('keywords', trans('common.keywords'),['class'=> 'control-label','style'=>'width:100%']) !!}
                        {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('common.keywords') ,'class' => 'form-control tagsinput']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('order', trans('common.order'),['class'=> 'control-label']) !!}
                        {!! Form::number('order', $record->order, ['placeholder' => trans('common.order') ,'class' => 'form-control']) !!}
                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-4" id="sidebar">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('common.status') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!!  Form::hidden('video_id', $record->id) !!}
                    <div class="form-group">
                        {!! Form::label('tags', trans('news::video.tags'),['class'=> 'control-label']) !!}
                        {!! Form::select('tags_ids[]', $tagList , $tagIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>

                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_comment', null , $record->is_comment) !!}
                            <i></i> {{trans('common.is_comment')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('common.is_active')}}
                        </label>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i
                                    class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->

    {!! Form::close() !!}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'AdminLTE/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'AdminLTE/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
            $('.fileinput').fileinput();
            $('.tagsinput').tagsinput();
            /*--------------------------------------------------------
             Sticky Sidebar
             * --------------------------------------------------------*/
            jQuery(document).ready(function () {
                jQuery('#sidebar,#content').theiaStickySidebar();
            });
            //active menu
            activeMenu('video', 'news_management');
        });
    </script>
@endpush