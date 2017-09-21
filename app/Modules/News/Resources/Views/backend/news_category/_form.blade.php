@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::news_category.management')}}
            <small>{{trans('news::news_category.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news_category.index') !!}">{{trans('news::news_category.management')}}</a></li>
            <li class="active">{{trans('news::news_category.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['news_category.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'news_category.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::news_category.create_edit')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('name', trans('news::news_category.name'),['class'=> 'control-label']) !!}
                        {!! Form::text('name', $record->name, ['placeholder' => trans('news::news_category.name') ,'class' => 'form-control']) !!}
                    </div><!-- /.form-group -->

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('parent_id', trans('news::news_category.parent_id'),['class'=> 'control-label']) !!}
                                {!! Form::select('parent_id', $newsCategoryList , $record->parent_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('slug', trans('news::news_category.slug'),['class'=> 'control-label']) !!}
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('news::news_category.slug') ,'class' => 'form-control']) !!}
                            </div><!-- /.form-group -->
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', trans('news::news_category.description'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::news_category.description') ,'class' => 'form-control']) !!}
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        {!! Form::label('keywords', trans('news::news_category.keywords'),['class'=> 'control-label','style'=>'width:100%']) !!}
                        {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('news::news_category.keywords') ,'class' => 'form-control tagsinput']) !!}
                    </div><!-- /.form-group -->

                </div><!-- /.box-body -->
            </div><!-- /.box-solid -->
        </div><!-- /.col-md-8 -->
        <div class="col-md-4">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::news_category.status')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('_lft', trans('news::news_category._lft'),['class'=> 'control-label']) !!}
                                {!! Form::number('_lft', $record->_lft, ['placeholder' => trans('news::news_category._lft') ,'class' => 'form-control']) !!}
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('_rgt', trans('news::news_category._rgt'),['class'=> 'control-label']) !!}
                                {!! Form::number('_rgt', $record->_rgt, ['placeholder' => trans('news::news_category._rgt') ,'class' => 'form-control']) !!}
                            </div><!-- /.form-group -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                            {{trans('news::news_category.is_cuff')}}
                        </label>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('common.is_active')}}
                        </label>
                    </div><!-- /.form-group -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <button class="btn btn-success btn-lg" type="submit"><i
                                    class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div><!-- /.form-group -->
                </div>
            </div><!-- /.box-solid -->
        </div><!-- /.col-md-4 -->
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
            //Date range picker with time picker
        });
        $(window).resize(function () {
            $('.select2').select2();
        });
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
        //active menu
        activeMenu('news_management', 'news_category');
    </script>
@endpush