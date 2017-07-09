@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::video_category.management')}}
            <small>{{trans('news::video_category.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('video_category.index') !!}">{{trans('news::video_category.management')}}</a>
            </li>
            <li class="active">{{trans('news::video_category.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['video_category.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'video_category.store','method' => 'post', 'files' => 'true']) !!}
    @endif

    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::video_category.name')}}</h3>

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
                        {!! Form::label('parent_id', trans('news::video_category.parent_id'),['class'=> ' control-label']) !!}
                        {!! Form::select('parent_id', $videoCategoryList , $record->parent_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('_lft', trans('news::video_category._lft'),['class'=> ' control-label']) !!}
                        {!! Form::number('_lft', $record->_lft, ['placeholder' => trans('news::video_category._lft') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('_rgt', trans('news::video_category._rgt'),['class'=> ' control-label']) !!}
                        {!! Form::number('_rgt', $record->_rgt, ['placeholder' => trans('news::video_category._rgt') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', trans('news::video_category.name'),['class'=> ' control-label']) !!}
                        {!! Form::text('name', $record->name, ['placeholder' => trans('news::video_category.name') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', trans('news::video_category.slug'),['class'=> ' control-label']) !!}
                        {!! Form::text('slug', $record->slug, ['placeholder' => trans('news::video_category.slug') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('news::video_category.description'),['class'=> ' control-label']) !!}
                        {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::video_category.description') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('keywords', trans('news::video_category.keywords'),['class'=> ' control-label']) !!}
                        {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('news::video_category.keywords') ,'class' => 'form-control tagsinput']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('icon', trans('news::video_category.icon'),['class'=> ' control-label']) !!}
                        {!! Form::text('icon', $record->icon, ['placeholder' => trans('news::video_category.icon') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                            {{trans('news::video_category.is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('news::video_category.is_active')}}
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
    </div><!-- end row -->
    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme.'::AdminLTE/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ Theme::asset($activeTheme.'::js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme.'::AdminLTE/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme.'::js/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
            $('.tagsinput').tagsinput();
            //active menu
            activeMenu('video_category', 'news_management');
        });
    </script>
@endsection