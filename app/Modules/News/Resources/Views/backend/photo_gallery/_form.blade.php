@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo_gallery.management')}}
            <small>{{trans('news::photo_category.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('photo_gallery.index') !!}">{{trans('news::photo_gallery.management')}}</a></li>
            <li class="active">{{trans('news::photo_gallery.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['photo_gallery.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'photo_gallery.store','method' => 'post', 'files' => 'true']) !!}
    @endif

    {!! Form::hidden('user_id', Auth::user()->id ) !!}

    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::photo_category.news_create_edit')}}</h3>

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
                        {!! Form::label('photo_category_id', trans('news::photo_gallery.photo_category_id'),['class'=> 'control-label']) !!}
                        {!! Form::select('photo_category_id', $photoCategories , $record->photo_category_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', trans('news::photo_gallery.title'),['class'=> 'control-label']) !!}
                        {!! Form::text('title', $record->name, ['placeholder' => trans('news::photo_gallery.title') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', trans('news::photo_gallery.slug'),['class'=> 'control-label']) !!}
                        {!! Form::text('slug', $record->slug, ['placeholder' => trans('news::photo_gallery.slug') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('short_url', trans('news::photo_gallery.short_url'),['class'=> 'control-label']) !!}
                        {!! Form::text('short_url', $record->short_url, ['placeholder' => trans('news::photo_gallery.short_url') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('news::photo_gallery.description'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::photo_gallery.description') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('keywords', trans('news::photo_gallery.keywords'),['class'=> 'control-label']) !!}
                        {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('news::photo_gallery.keywords') ,'class' => 'form-control tagsinput']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('thumbnail', trans('news::photo_gallery.thumbnail'),['class'=> 'control-label','style'=>'width:100%;']) !!}

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                 style="width: 200px; height: 150px;">
                                <img src="{{asset('/gallery/' . $record->id . '/photos/' . $record->thumbnail)}}">
                            </div>
                            <div>
                                <span class="btn btn-default btn-file"><span
                                            class="fileinput-new">{{trans('news::photo_gallery.select_image')}}</span><span
                                            class="fileinput-exists">{{trans('news::photo_gallery.change')}}</span>{!! Form::file('thumbnail') !!}</span>
                                <a href="#" class="btn btn-default fileinput-exists"
                                   data-dismiss="fileinput">{{trans('news::photo_gallery.remove')}}</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-lg-6 -->

        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::photo_gallery.status') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                            {{trans('news::photo_gallery.is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('common.is_active')}}
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <button class="btn btn-success btn-lg" type="submit"><i
                                    class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
            </div>
            <!-- /.box -->

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::photo_gallery.tags') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!!  Form::hidden('photo_gallery_id', $record->id) !!}
                    <div class="form-group">
                        {!! Form::label('tags', trans('news::photo_gallery.tags'),['class'=> 'control-label']) !!}
                        {!! Form::select('tags_ids[]', $tagList , $tagIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.fileinput').fileinput();
            $('.select2').select2();
            $('.tagsinput').tagsinput();
        });
        $(window).resize(function () {
            $('.select2').select2();
            $('.tagsinput').tagsinput();
        });
        //active menu
        activeMenu('photo_gallery', 'news_management');
    </script>
@endpush