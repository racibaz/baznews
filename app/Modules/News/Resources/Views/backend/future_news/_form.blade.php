@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::future_news.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('future_news.index') !!}">{{trans('news::future_news.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Main Content Element  Start-->
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['future_news.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'future_news.store','method' => 'post', 'files' => 'true']) !!}
    @endif
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
                            {!! Form::label('news_id', trans('news::future_news.news_title'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('news_id', $newsAllList , $record->news_id , ['placeholder' => trans('news::future_news.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('future_datetime', trans('news::future_news.future_datetime'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('future_datetime', $record->future_datetime, ['placeholder' => trans('news::future_news.future_datetime') ,'class' => 'form-control','id'=>'show_time']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <b>{{trans('common.status')}}</b>
                            </div>
                            <div class="col-lg-10">
                                <label>
                                    {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                    <i></i> {{trans('common.is_active')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-success" type="submit"><i
                                            class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div><!-- end row -->

    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset($themeAssetsPath . 'js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}"
          rel="stylesheet">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/moment/locale/tr.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        //active menu
        $(function () {
            //Date range picker with time picker
            $('#show_time').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                locale: 'tr'
            });
        });
        //active menu
        $('.select2').select2();
        activeMenu('news_management', 'future_news');
    </script>
@endpush