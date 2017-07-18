@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo_category.management')}}
            <small>{{trans('news::photo_category.news_create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('photo_category.index') !!}">{{trans('news::photo_category.management')}}</a>
            </li>
            <li class="active">{{trans('news::photo_category.news_create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['photo_category.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'photo_category.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-lg-8" id="content">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::photo_category.create_edit')}}</h3>

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
                        {!! Form::label('name', trans('news::photo_category.name'),['class'=> 'control-label']) !!}
                        {!! Form::text('name', $record->name, ['placeholder' => trans('news::photo_category.name') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('parent_id', trans('news::photo_category.parent_id'),['class'=> 'control-label']) !!}
                        {!! Form::select('parent_id', $photoCategoryList , $record->parent_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', trans('news::photo_category.slug'),['class'=> 'control-label']) !!}
                        {!! Form::text('slug', $record->slug, ['placeholder' => trans('news::photo_category.slug') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('news::photo_category.description'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::photo_category.description') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('icon', trans('news::photo_category.icon'),['class'=> 'control-label']) !!}
                        {!! Form::text('icon', $record->icon, ['placeholder' => trans('news::photo_category.icon') ,'class' => 'form-control']) !!}
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-4" id="sidebar">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::photo_category.status')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('_lft', trans('news::photo_category._lft'),['class'=> 'control-label']) !!}
                                {!! Form::number('_lft', $record->_lft, ['placeholder' => trans('news::photo_category._lft') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('_rgt', trans('news::photo_category._rgt'),['class'=> 'control-label']) !!}
                                {!! Form::number('_rgt', $record->_rgt, ['placeholder' => trans('news::photo_category._rgt') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                            {{trans('news::photo_category.is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('news::photo_category.is_active')}}
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
            </div><!-- .box -->

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::photo_category.keywords')}}</h3>

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
                        {!! Form::label('keywords', trans('news::photo_category.keywords'),['class'=> 'control-label']) !!}
                        {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('news::photo_category.keywords') ,'class' => 'form-control tagsinput']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- .box -->

        </div><!-- /.col-lg-4 -->
    </div><!-- end row -->
    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ Theme::asset($activeTheme . '::js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
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
        activeMenu('photo_category', 'news_management');
    </script>
@endsection