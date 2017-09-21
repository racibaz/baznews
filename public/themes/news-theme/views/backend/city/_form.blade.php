@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('city.management')}}
            <small>{{trans('city.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('city.index') !!}">{{trans('city.management')}}</a></li>
            <li class="active">{{trans('city.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Main Content Element  Start-->
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['city.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'city.store','method' => 'post', 'files' => 'true']) !!}
    @endif

    <div class="row">
        <div class="col-md-6">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('city.create_edit')}}</h3>

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
                            {!! Form::label('country_id', trans('country.name'),['class'=> 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::select('country_id', $countries , $record->country_id , ['placeholder' => trans('city.choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('name', trans('city.name'),['class'=> 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('name', $record->name, ['placeholder' => trans('city.name') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <b>
                                    {{trans('common.status')}}
                                </b>
                            </div>
                            <div class="col-lg-10">
                                <label>
                                    {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                    {{trans('common.is_active')}}
                                </label>
                            </div>
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-success" type="submit"><i
                                            class="fa fa-check-square-o"></i> {{trans('city.save')}}</button>
                            </div>
                        </div>
                    </div><!-- .form-group -->
                </div><!-- /.box-body -->
            </div><!-- /.col -->

        </div>
    </div><!-- end row -->
    {!! Form::close() !!}
    <!-- Main Content Element  End-->
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/select2/dist/css/select2.min.css') }}">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        //active menu
        activeMenu('city', 'general_setting');
        $('.select2').select2();
    </script>
@endpush