@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('search_list.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('search_list.index') !!}">{{trans('search_list.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['search_list.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'search_list.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">

            <div class="box box-default">
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
                        <div class="row">
                            {!! Form::label('module_slug', trans('search_list.module_slug'),['class'=> 'col-lg-5 control-label']) !!}
                            <div class="col-lg-12">
                                {!! Form::select('module_slug', $moduleSlugs , $record->module_slug , ['placeholder' => trans('common.choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('class_path', trans('search_list.class_path'),['class'=> 'control-label']) !!}
                        {!! Form::text('class_path', $record->class_path, ['placeholder' => trans('search_list.class_path') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('field', trans('search_list.field'),['class'=> 'control-label']) !!}
                        {!! Form::text('field', $record->field, ['placeholder' => trans('search_list.field') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('route_name', trans('search_list.route_name'),['class'=> 'control-label']) !!}
                        {!! Form::text('route_name', $record->name, ['placeholder' => trans('search_list.route_name') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_require_slug', null , $record->is_require_slug) !!}
                            {{trans('search_list.is_require_slug')}}
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
            </div><!-- /.box .box-default -->
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/select2/dist/css/select2.min.css') }}">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        //active menu
        activeMenu('search_list', 'general_setting');
        $('.select2').select2();
    </script>
@endpush