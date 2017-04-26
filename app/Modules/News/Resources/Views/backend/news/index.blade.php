@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::news.management')}}
            <small>{{trans('news::news.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news.index') !!}">{{trans('news::news.management')}}</a></li>
            <li class="active">{{trans('news::news.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <p>
                <a href="javascript:void(0);" class="btn btn-primary" id="filter_btn"><i class="fa fa-search"></i> {{trans('news::news.filter_search')}}</a>
                <a href="javascript:void(0);" class="btn btn-info" id="statis_btn"><i class="fa fa-bar-chart"></i> {{trans('news::news.statistic')}}</a>
            </p>
        </div>
        <div class="col-lg-12">
            <div class="box box-default collapsed-box" id="filterBox">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-search"></i> {{trans('news::news.filter_search')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool filterBtn" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => 'newsFilter','method' => 'post']) !!}
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div>{!! Form::label('news_category_id', trans('news::news.news_category'),['class'=>'control-label']) !!}</div>
                                {!! Form::select('news_category_id',  $newsCategoryList , null, ['placeholder' => trans('news::news.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('slug', trans('news::news.slug')) !!}
                                {!! Form::text('slug', null ,['placeholder' => trans('news::news.slug'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('hit', trans('news::news.hit')) !!}
                                {!! Form::number('hit', null ,['placeholder' => trans('news::news.hit'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', null, null, [
                                    'data-toggle' => 'toggle',
                                    'data-size' => 'mini',
                                    'data-on' => '<i class="fa fa-check"></i>',
                                    'data-off' => '<i class="fa fa-close"></i>',
                                    'data-onstyle' => "success",
                                    'data-offstyle' => "danger"
                                    ] ) !!}
                                    {!! trans('news::news.status') !!}
                                </label>
                            </div>
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('band_news', null, null, [
                                    'data-toggle' => 'toggle',
                                    'data-size' => 'mini',
                                    'data-on' => '<i class="fa fa-check"></i>',
                                    'data-off' => '<i class="fa fa-close"></i>',
                                    'data-onstyle' => "success",
                                    'data-offstyle' => "danger"
                                    ] ) !!}
                                    {!! trans('news::news.band_news') !!}
                                </label>
                            </div>
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('box_cuff', null, null, [
                                    'data-toggle' => 'toggle',
                                    'data-size' => 'mini',
                                    'data-on' => '<i class="fa fa-check"></i>',
                                    'data-off' => '<i class="fa fa-close"></i>',
                                    'data-onstyle' => "success",
                                    'data-offstyle' => "danger"
                                    ] ) !!}
                                    {!! trans('news::news.box_cuff') !!}
                                </label>
                            </div>
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('is_cuff', null, null, [
                                    'data-toggle' => 'toggle',
                                    'data-size' => 'mini',
                                    'data-on' => '<i class="fa fa-check"></i>',
                                    'data-off' => '<i class="fa fa-close"></i>',
                                    'data-onstyle' => "success",
                                    'data-offstyle' => "danger"
                                    ] ) !!}
                                    {!! trans('news::news.is_cuff') !!}
                                </label>
                            </div>
                        </div><!-- /.col-lg-3 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('break_news', null, null, [
                                    'data-toggle' => 'toggle',
                                    'data-size' => 'mini',
                                    'data-on' => '<i class="fa fa-check"></i>',
                                    'data-off' => '<i class="fa fa-close"></i>',
                                    'data-onstyle' => "success",
                                    'data-offstyle' => "danger"
                                    ] ) !!}
                                    {!! trans('news::news.break_news') !!}
                                </label>
                            </div>
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('main_cuff', null, null, [
                                    'data-toggle' => 'toggle',
                                    'data-size' => 'mini',
                                    'data-on' => '<i class="fa fa-check"></i>',
                                    'data-off' => '<i class="fa fa-close"></i>',
                                    'data-onstyle' => "success",
                                    'data-offstyle' => "danger"
                                    ] ) !!}
                                    {!! trans('news::news.main_cuff') !!}
                                </label>
                            </div>
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('mini_cuff', null, null, [
                                    'data-toggle' => 'toggle',
                                    'data-size' => 'mini',
                                    'data-on' => '<i class="fa fa-check"></i>',
                                    'data-off' => '<i class="fa fa-close"></i>',
                                    'data-onstyle' => "success",
                                    'data-offstyle' => "danger"
                                    ] ) !!}
                                    {!! trans('news::news.mini_cuff') !!}
                                </label>
                            </div>
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('is_comment', null, null, [
                                    'data-toggle' => 'toggle',
                                    'data-size' => 'mini',
                                    'data-on' => '<i class="fa fa-check"></i>',
                                    'data-off' => '<i class="fa fa-close"></i>',
                                    'data-onstyle' => "success",
                                    'data-offstyle' => "danger"
                                    ] ) !!}
                                    {!! trans('news::news.is_comment') !!}
                                </label>
                            </div>
                        </div><!-- /.col-lg-3 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('start_date', trans('news::news.start_date') . '(2016-06-07 15:10:54)') !!}
                                {!! Form::text('start_date', null ,['placeholder' => trans('news::news.start_date'),'class' => 'form-control','id'=>'start_date']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('end_date', trans('news::news.end_date') . '(2016-06-07 15:10:54)') !!}
                                {!! Form::text('end_date', null ,['placeholder' => trans('news::news.end_date'),'class' => 'form-control','id'=>'end_date']) !!}
                            </div>
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('is_active', null, null, [
                                    'data-toggle' => 'toggle',
                                    'data-size' => 'mini',
                                    'data-on' => '<i class="fa fa-check"></i>',
                                    'data-off' => '<i class="fa fa-close"></i>',
                                    'data-onstyle' => "success",
                                    'data-offstyle' => "danger"
                                    ] ) !!}
                                    {!! trans('news::news.is_active') !!}
                                </label>
                            </div>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::submit(trans('common.search'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="box box-default collapsed-box" id="statisticBox">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-bar-chart"></i> {{trans('news::news.statistic')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool statisBtn" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <div class="form-group">
                        İstatiksel Veriler..
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if(Auth::user()->can('create-news'))
            <div class="form-group pull-left">
                <a href="{{ route('news.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('news::news.news_create') }}
                </a>
            </div>
            @endif
            <div class="form-group pull-right">
                @if(Auth::user()->can('forgetCache-news'))
                    <a href="{{ route('forget_news_cache') }}" class="btn btn-danger">
                        <i class="fa fa-eraser"></i> {{ trans('news::news.forget_news_cache') }}
                    </a>
                @endif
                @if(Auth::user()->can('showTrashedRecords-news'))
                    <a href="{{ route('showTrashedRecords') }}" class="btn btn-primary">
                        <i class="fa fa-trash-o"></i> {{ trans('news::news.trashed_news') }}
                    </a>
                @endif
            </div>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news::news.list')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($statusList as $index => $status)
                                <a href="{{route('news_statuses',[$index])}}" class="btn btn-primary">
                                    {{$status}} <span class="badge">{{$newsCountByStatus[$index]}}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('news::news.title')}}</th>
                                <th>{{trans('news::news.short_url')}}</th>
                                <th>{{trans('news::news.status')}}</th>
                                <th>{{trans('news::news.band_news')}}</th>
                                <th>{{trans('news::news.box_cuff')}}</th>
                                <th>{{trans('news::news.is_cuff')}}</th>
                                <th>{{trans('news::news.break_news')}}</th>
                                <th>{{trans('news::news.is_comment')}}</th>
                                <th>{{trans('news::news.main_cuff')}}</th>
                                <th>{{trans('news::news.mini_cuff')}}</th>
                                <th>{{trans('news::news.is_active')}}</th>
                                <th>{{trans('news::news.edit_delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $index => $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('news.show', $record->title , $record, [] ) !!}</td>
                                    <td> {{$record->short_url}} </td>
                                    <td>
                                        {{--<a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'status']) !!}">{{$record->status}}</a>--}}
                                        {!! Form::open(['route' => 'status_toggle','method' => 'post']) !!}
                                        {!! Form::hidden('recordId',$record->id) !!}
                                        <div class="input-group input-group-sm">
                                            {!! Form::select('status', $statusList , $record->status , ['placeholder' => trans('news::news.please_choose'),'class' => 'form-control select2']) !!}
                                            <span class="input-group-btn">
                                                {!! Form::submit(trans('news::news.done'), ['class' => 'btn btn-primary btn-flat']) !!}
                                            </span>
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'band_news']) !!}">
                                            {!! $record->band_news ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'box_cuff']) !!}">
                                            {!! $record->box_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'is_cuff']) !!}">
                                            {!! $record->is_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'break_news']) !!}">
                                            {!! $record->break_news ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'is_comment']) !!}">
                                            {!! $record->is_comment ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'main_cuff']) !!}">
                                            {!! $record->main_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'mini_cuff']) !!}">
                                            {!! $record->mini_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'is_active']) !!}">
                                            {!!$record->is_active ? '<label class="badge bg-green">' . trans('news::news.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('news.destroy',  $record))) !!}
                                            {!! link_to_route('news.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                            {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/select2/dist/css/select2.min.css') }}">
    <link href="{{ Theme::asset($activeTheme .'::js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <style>
        .input-group-sm>.form-control,
        .input-group-sm>.input-group-addon,
        .input-group-sm>.input-group-btn>.btn{
            height: 34px;
        }
    </style>
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme .'::js/moment/min/moment.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/moment/locale/tr.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        function dateTime() {
            //Date range picker with time picker
            $('#start_date,#end_date').datetimepicker({
                format:'YYYY-MM-DD HH:mm:ss',
                locale:'tr'
            });
        }
        //active menu
        $(function () {
            dateTime();
            $('.select2').select2({ width: '100%',language: "tr" });

            $('#filter_btn').click(function () {
                dateTime();
                $('#filterBox').removeClass('collapsed-box');
                $('#statisticBox').addClass('collapsed-box');
            });
            $('#statis_btn').click(function () {
                $('#filterBox').addClass('collapsed-box');
                $('#statisticBox').removeClass('collapsed-box');
            });

        });
        //active menu

        activeMenu('news_management','news');
    </script>
@endsection