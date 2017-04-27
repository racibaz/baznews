@extends($activeTheme .'::backend.master')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                @if(Auth::user()->can('showTrashedRecords-news'))
                    <a href="{{ route('news.index') }}" class="btn btn-info">
                        <i class="fa fa-angle-left"></i>&nbsp;&nbsp;{{ trans('news::news.back_index_page') }}
                    </a>
                @endif

            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news::news.trashed_news_list')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $trashedRecords ])
                    <table id="countries" class="table table-bnewsed table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('news::news.title')}}</th>
                            <th>{{trans('news::news.hit')}}</th>
                            <th>{{trans('news::news.band_news')}}</th>
                            <th>{{trans('news::news.box_cuff')}}</th>
                            <th>{{trans('news::news.is_cuff')}}</th>
                            <th>{{trans('news::news.break_news')}}</th>
                            <th>{{trans('news::news.is_comment')}}</th>
                            <th>{{trans('news::news.main_cuff')}}</th>
                            <th>{{trans('news::news.mini_cuff')}}</th>
                            <th>{{trans('news::common.is_active')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trashedRecords as $index => $trashedRecord)
                            <tr>
                                <td>{{$trashedRecord->id}}</td>
                                <td>{!! link_to_route('news.show', $trashedRecord->title , $trashedRecord, [] ) !!}</td>
                                <td> {{$trashedRecord->hit}} </td>
                                <td>
                                    <a href="{!! route('toggle_boolean_type',['newsId' => $trashedRecord->id,'key' => 'band_news']) !!}">
                                        {!! $trashedRecord->band_news ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                    </a>
                                </td>
                                <td>
                                    <a href="{!! route('toggle_boolean_type',['newsId' => $trashedRecord->id,'key' => 'box_cuff']) !!}">
                                        {!! $trashedRecord->box_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                    </a>
                                </td>
                                <td>
                                    <a href="{!! route('toggle_boolean_type',['newsId' => $trashedRecord->id,'key' => 'is_cuff']) !!}">
                                        {!! $trashedRecord->is_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                    </a>
                                </td>
                                <td>
                                    <a href="{!! route('toggle_boolean_type',['newsId' => $trashedRecord->id,'key' => 'break_news']) !!}">
                                        {!! $trashedRecord->break_news ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                    </a>
                                </td>
                                <td>
                                    <a href="{!! route('toggle_boolean_type',['newsId' => $trashedRecord->id,'key' => 'is_comment']) !!}">
                                        {!! $trashedRecord->is_comment ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                    </a>
                                </td>
                                <td>
                                    <a href="{!! route('toggle_boolean_type',['newsId' => $trashedRecord->id,'key' => 'main_cuff']) !!}">
                                        {!! $trashedRecord->main_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                    </a>
                                </td>
                                <td>
                                    <a href="{!! route('toggle_boolean_type',['newsId' => $trashedRecord->id,'key' => 'mini_cuff']) !!}">
                                        {!! $trashedRecord->mini_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-red"><i class="fa fa-times"></i></span>'!!}
                                    </a>
                                </td>
                                <td>
                                    <a href="{!! route('toggle_boolean_type',['newsId' => $trashedRecord->id,'key' => 'is_active']) !!}">
                                        {!!$trashedRecord->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('historyForceDelete',  $trashedRecord->id ))) !!}
                                            {!! Form::hidden('historyForceDeleteRecordId', $trashedRecord->id) !!}
                                        {!! link_to_route('trashedNewsRestore', trans('news::news.trashed_news_restore'), $trashedRecord->id, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                        {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
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