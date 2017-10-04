@extends($activeTheme .'::backend.master')
@section('content')


    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    {!! Form::open(['route' => 'newsFilter','method' => 'post']) !!}

                    <div class="form-group">
                        {!! Form::label('news_category_id', trans('news::news.news_category')) !!}
                        {!! Form::select('news_category_id',  $newsCategoryList , null, ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('id', trans('common.id')) !!}
                        {!! Form::number('id', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', trans('common.title')) !!}
                        {!! Form::text('title', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', trans('common.slug')) !!}
                        {!! Form::text('slug', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
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
                            {!! trans('common.status') !!}
                        </label>
                    </div>
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
                            {!! trans('common.is_comment') !!}
                        </label>
                    </div>
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
                            {!! trans('common.is_active') !!}
                        </label>
                    </div>
                    <div class="form-group">
                        {!! Form::label('start_date', trans('news::news.start_date') . '(2016-06-07 15:10:54)') !!}
                        {!! Form::text('start_date', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('end_date', trans('news::news.end_date') . '(2016-06-07 15:10:54)') !!}
                        {!! Form::text('end_date', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('common.filter'), ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        İstatiksel Veriler
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news::news.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('common.title')}}</th>
                                <th>{{trans('news::news.short_url')}}</th>
                                <th>{{trans('news::news.band_news')}}</th>
                                <th>{{trans('news::news.box_cuff')}}</th>
                                <th>{{trans('news::news.is_cuff')}}</th>
                                <th>{{trans('news::news.break_news')}}</th>
                                <th>{{trans('common.is_comment')}}</th>
                                <th>{{trans('news::news.main_cuff')}}</th>
                                <th>{{trans('news::news.mini_cuff')}}</th>
                                <th>{{trans('common.edit_delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $index => $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('news_show', $record->title , $record, [] ) !!}</td>
                                    <td> {{$record->short_url}} </td>
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
                                        <div class="btn-group">
                                            @if($record->is_active)
                                                {!! link_to_route('show_news', trans('common.show'), $record->slug, ['target' => '_blank', 'class' => 'btn btn-info btn-xs'] ) !!}
                                            @endif
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
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset($themeAssetsPath . 'js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}"
          rel="stylesheet">
    <style>
        .input-group-sm > .form-control,
        .input-group-sm > .input-group-addon,
        .input-group-sm > .input-group-btn > .btn {
            height: 34px;
        }
    </style>
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/moment/locale/tr.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        function dateTime() {
            //Date range picker with time picker
            $('#start_date,#end_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                locale: 'tr'
            });
        }
        //active menu
        $(function () {
            dateTime();
            $('.select2').select2({width: '100%', language: "tr"});

            $('#filter_btn').click(function () {
                $('#filterBox').toggle();
                $('#statisticBox').hide();
            });
            $('#statis_btn').click(function () {
                $('#filterBox').hide();
                $('#statisticBox').toggle();
            });

        });
            //active menu
            activeMenu('news', 'news_management');
    </script>
@endpush