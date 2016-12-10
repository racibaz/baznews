@extends($activeTheme .'::backend.master')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    {!! Form::open(['route' => 'newsFilter','method' => 'post']) !!}

                    <div class="form-group">
                        {!! Form::label('news_category_id', trans('news.news_category_id')) !!}
                        {!! Form::select('news_category_id',  $newsCategoryList , null, ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('id', trans('news.id')) !!}
                        {!! Form::number('id', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', trans('news.title')) !!}
                        {!! Form::text('title', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', trans('news.slug')) !!}
                        {!! Form::text('slug', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('hit', trans('news.hit')) !!}
                        {!! Form::number('hit', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
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
                            {!! trans('news.status') !!}
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
                            {!! trans('news.band_news') !!}
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
                            {!! trans('news.box_cuff') !!}
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
                            {!! trans('news.is_cuff') !!}
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
                            {!! trans('news.break_news') !!}
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
                            {!! trans('news.main_cuff') !!}
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
                            {!! trans('news.mini_cuff') !!}
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
                            {!! trans('news.is_comment') !!}
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
                            {!! trans('news.is_active') !!}
                        </label>
                    </div>
                    <div class="form-group">
                        {!! Form::label('start_date', trans('news.start_date') . '(2016-06-07 15:10:54)') !!}
                        {!! Form::text('start_date', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('end_date', trans('news.end_date') . '(2016-06-07 15:10:54)') !!}
                        {!! Form::text('end_date', null ,['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('common.search'), ['class' => 'btn btn-primary']) !!}
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
            <div style="margin-bottom: 20px;">
                <a href="{{ route('news.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news.managment')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="countries" class="table table-bnewsed table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('news.title')}}</th>
                            <th>{{trans('news.hit')}}</th>
                            <th>{{trans('news.status')}}</th>
                            <th>{{trans('news.band_news')}}</th>
                            <th>{{trans('news.box_cuff')}}</th>
                            <th>{{trans('news.is_cuff')}}</th>
                            <th>{{trans('news.break_news')}}</th>
                            <th>{{trans('news.is_comment')}}</th>
                            <th>{{trans('news.main_cuff')}}</th>
                            <th>{{trans('news.mini_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('news.show', $record->title , $record, [] ) !!}</td>
                                    <td> {{$record->hit}} </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'status']) !!}">{{$record->status}}</a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'band_news']) !!}">{{$record->band_news}}</a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'box_cuff']) !!}">{{$record->box_cuff}}</a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'is_cuff']) !!}">{{$record->is_cuff}}</a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'break_news']) !!}">{{$record->break_news}}</a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'is_comment']) !!}">{{$record->is_comment}}</a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'main_cuff']) !!}">{{$record->main_cuff}}</a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'mini_cuff']) !!}">{{$record->mini_cuff}}</a>
                                    </td>
                                    <td>
                                        <a href="{!! route('toggle_boolean_type',['newsId' => $record->id,'key' => 'is_active']) !!}">
                                            {!!$record->is_active ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}
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
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{trans('news.title')}}</th>
                            <th>{{trans('news.hit')}}</th>
                            <th>{{trans('news.status')}}</th>
                            <th>{{trans('news.band_news')}}</th>
                            <th>{{trans('news.box_cuff')}}</th>
                            <th>{{trans('news.is_cuff')}}</th>
                            <th>{{trans('news.break_news')}}</th>
                            <th>{{trans('news.is_comment')}}</th>
                            <th>{{trans('news.main_cuff')}}</th>
                            <th>{{trans('news.mini_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection